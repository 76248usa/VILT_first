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

    public function update(Request $request, $id){
        $project = Project::findOrFail($id);

        $request->validate([
            'title' => 'required'
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index');

    }

    public function destroy($id){
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect()->route('projects.index');

    }
}
