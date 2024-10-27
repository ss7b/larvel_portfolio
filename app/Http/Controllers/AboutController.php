<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $experiences =auth()->user()->experiences;
        $skills = auth()->user()->skill;
        $educations =auth()->user()->educations;
        return view('about',compact(['experiences','skills','educations']));
    }
}
