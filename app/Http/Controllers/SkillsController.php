<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
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
        $skills = auth()->user()->skill;
        return view('skills.index',compact("skills"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'skill' => 'required',
            'percent' => 'required',
        ]);
        $data['user_id']= auth()->user()->id;
        Skills::create($data);
        return redirect('/about');
    }
     /**
     * Display the specified resource.
     */
    public function show(Skills $skills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skills $skills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skills $skill)
    {
        $data = request()->validate([
            'skill' => 'sometimes|required',
            'percent' => 'sometimes|required',
        ]);
        $skill->update($data);
        return redirect("/about");
    }

    /**
     * Remove the specified resource from storage.
     */
    // todo rename var
    public function destroy(Skills $skill)
    {
        $skill->destroy($skill->id);
        return back();
    }
}
