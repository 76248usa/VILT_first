<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        return Inertia::render('Projects/All', [
            'projects' => Project::all(),
            'availableColors' => Project::getAvailableTextColors(),
            'availableIcons' => Project::getAvailableIcons(),
        ]);

    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index');
    }
}
