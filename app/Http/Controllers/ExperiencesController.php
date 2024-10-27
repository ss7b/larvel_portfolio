<?php

namespace App\Http\Controllers;

use App\Models\Experiences;
use Illuminate\Http\Request;

class ExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences =auth()->user()->Experiences;
        return view(['experience.index'],compact('experiences'));
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
        ]);
        $data["user_id"] = auth()->user()->id;

        Experiences::create($data);
        return redirect('about')->with('flash_message', 'Image Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experiences $experiences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experiences $experiences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experiences $experience)
    {
        $data = request()->validate([
            'title' => 'sometimes|required',
            'from' => 'sometimes|required',
            'to' => 'sometimes|required',
        ]);
        $experience->update($data);
        return redirect("/about");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experiences $experience)
    {
        $experience->destroy($experience->id);
        return back();
    }
}
