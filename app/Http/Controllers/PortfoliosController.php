<?php

namespace App\Http\Controllers;

use App\Models\Portfolios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfoliosController extends Controller
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
        $portfolios = auth()->user()->portfolios;
        return view('portfolios.index',compact("portfolios"));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'image' => 'required',
            'link' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $data["image"] = '/storage/'.$path;
            $data["user_id"] = auth()->user()->id;
            Portfolios::create($data);
            return redirect('portfolios')->with('flash_message', 'Image Added!');
        } else {
            return redirect('portfolios')->with('flash_message', 'Please select an image to upload.');
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolios $portfolios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolios $portfolios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolios $portfolio)
    {
        $data = request()->validate([
            'link' => 'sometimes|required',
            'image' => 'sometimes|file', // Allow optional file upload
        ]);
    
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($portfolio->image) {
                Storage::delete($portfolio->image);
            }
    
            // Upload the new image
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $data['image'] = '/storage/' . $path;
        }
    
        $portfolio->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolios $portfolio)
    {
        $portfolio->destroy($portfolio->id);
        return back();
    }
    
}
