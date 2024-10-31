<?php

namespace App\Http\Controllers;

use App\Models\MainInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;

class MainInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maininfos = auth()->user()->mainInfo;
        $hasExistingData = MainInfo::count() > 0;
        return view('mainInfo.index',compact(["maininfos", "hasExistingData"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if any users exist first
        $existingUsers = MainInfo::count();
    
        if ($existingUsers > 0) {
            return redirect()->back()->withErrors(['firstName' => 'لا يمكنك ااضافة المعلومات مرتين لنفس المستخدم']);
        }
        $data = request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'description' => 'required',
            'image' => 'required',
            'provider' => 'required',
            'cv' => 'required|mimes:pdf|max:2048',
            'birthday' => 'required',
            'contact_number' => ['required', 'string', 'max:10'],
            'email' => 'required',
            'location' => 'required',
        ]);
        

        // حفظ الملف في التخزين
        
        
        if ($request->hasFile('image') && $request->hasFile('cv')) {
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $data["image"] = '/storage/'.$path;

            // pdf file
            $req =$request->file('cv');
            $file = $req->getClientOriginalName();
            $cvPath = $req->storeAs('pdf', $file, 'public');
            $data["cv"] = '/storage/'.$cvPath;
            // user id
            $data["user_id"] = auth()->user()->id;

            MainInfo::create($data);
            return redirect('mainInfo')->with('flash_message', 'Image Added!');
        } else {
            return redirect('image')->with('flash_message', 'Please select an image to upload.');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(MainInfo $mainInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainInfo $mainInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MainInfo $mainInfo)
    {
        $data = request()->validate([
            'firstName' => 'sometimes|required',
            'lastName' => 'sometimes|required',
            'description' => 'sometimes|required',
            'image' => 'sometimes|file', // Allow optional file upload
        ]);
    
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($mainInfo->image) {
                Storage::delete($mainInfo->image);
            }
    
            // Upload the new image
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $data['image'] = '/storage/' . $path;
        }
    
        $mainInfo->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainInfo $mainInfo)
    {
        //
    }
}
