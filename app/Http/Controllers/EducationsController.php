<?php

namespace App\Http\Controllers;

use App\Models\Educations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations =auth()->user()->educations;
        return view(['educations.index'],compact('educations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'from' => 'required',
            'to' => 'required',
            'provider' => 'required',
        ]);
        

        if ($request->hasFile('graduation')) {
            $fileName = time().$request->file('graduation')->getClientOriginalName();
            $path = $request->file('graduation')->storeAs('images', $fileName, 'public');
            $data["graduation"] = '/storage/'.$path;
            $data["user_id"] = auth()->user()->id;
            Educations::create($data);
            return redirect('about')->with('flash_message', 'Image Added!');
        } else {
            return redirect('about')->with('flash_message', 'Please select an image to upload.');
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Educations $education)
    {
        $data = request()->validate([
            'title' => 'sometimes|required',
            'from' => 'sometimes|required',
            'to' => 'sometimes|required',
            'provider' => 'sometimes|required',
            'graduation' => 'sometimes|file', // Allow optional file upload
        ]);
    
        if ($request->hasFile('graduation')) {
            // Delete the old image if it exists
            if ($education->graduation) {
                Storage::delete($education->graduation);
            }
    
            // Upload the new image
            $fileName = time() . $request->file('graduation')->getClientOriginalName();
            $path = $request->file('graduation')->storeAs('images', $fileName, 'public');
            $data['graduation'] = '/storage/' . $path;
        }
    
        $education->update($data);
        return redirect('/about');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Educations $education)
    {
        $education->destroy($education->id);
        return back();
    }
}
