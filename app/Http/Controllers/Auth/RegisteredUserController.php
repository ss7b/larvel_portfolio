<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
       // Check if any users exist first
       if ($request->has('is_admin') && $request->is_admin === '1') {
        return redirect()->back()->withErrors(['email' => 'Only one user can be registered.']);
        }
    $existingUsers = User::count();
        
    if ($existingUsers > 0) {
        return redirect()->back()->withErrors(['email' => 'Only one user can be registered.']);
    }

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:100', 'alpha_dash', 'unique:users'], // Update validation field
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'], // Update validation field
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'image' => 'https://ui-avatars.com/api/?name=' . urldecode($request->name),
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    $fileName = time().$request->file('image')->getClientOriginalName();
    $path = $request->file('image')->storeAs('images', $fileName, 'public');
    $request["image"] = '/storage/'.$path;
    $user->save(); // Save the user object with updated admin fla

    
    

    $user->save(); // Save the user object with updated admin flag

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
    }
}
 
 