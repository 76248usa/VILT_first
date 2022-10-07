<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Skill;
use Illuminate\Validation\Rule;

class SkillController extends Controller
{
    public function index(){
        return Inertia::render('Skills/All', [
            'skills' => Skill::all(),
            'availableColors' => Skill::getAvailableBackgroundColors(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique(Skill::class)
            ],
            'color' => [
                'required'
            ]
            ]);

            Skill::create($request->all());

            return redirect()->route('skills.index');

        }
}
