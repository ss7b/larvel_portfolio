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
    
        // Assuming 'is_admin' is a boolean field for admin status
        if ($request->has('is_admin') && $request->is_admin) {
            $user->is_admin = true; // Set admin flag if provided
        } else {
            $user->is_admin = false; // Default to non-admin
        }
    
        $user->save(); // Save the user object with updated admin flag
    
        event(new Registered($user));
    
        Auth::login($user);
    
        return redirect(RouteServiceProvider::HOME);
    }
}
