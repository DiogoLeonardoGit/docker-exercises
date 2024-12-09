<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ImagensProjeto;
use App\Models\FilesProjeto;

class ProjetoController extends Controller
{
    public function index()
    {
        // Fetch projects from the database
        $projects = Projeto::with('images', 'files')->get();

        // replace nulls end_date with current date
        $projects = $projects->map(function ($project) {
            if ($project->end_date == null) {
                $project->end_date = now()->toDateString();
            }
            return $project;
        });

        // order the projects by the most recent
        $projects = $projects->sortByDesc('end_date');
        
        // Pass projects to the view
        return view('projetos.index', compact('projects'));
    }

    public function create()
    {
        return view('projetos.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'languages' => 'required|string',
            'link' => 'nullable|url',
            'images.*' => 'nullable',
            'files.*' => 'nullable',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date'
        ]);

        // Create the project
        $project = Projeto::create($validatedData);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public');
                $fileName = basename($path);
                $project->images()->create([
                    'path' => $fileName,
                    'alt_text' => $image->getClientOriginalName()
                ]);
            }
        }

        // Handle file uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('public');
                $fileName = basename($path);
                $project->files()->create([
                    'path' => $fileName,
                    'name' => $file->getClientOriginalName()
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

}

