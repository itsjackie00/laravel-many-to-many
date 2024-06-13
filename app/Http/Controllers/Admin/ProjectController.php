<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
            'github' => 'nullable|url'
        ]);
    
        $project = new Project($request->all());
    
        if ($request->hasFile('image')) {
            $project->image = $request->file('image')->store('projects', 'public');
        }
    
        $project->save();
    
        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);
    
        $project->fill($request->all());
    
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete('public/' . $project->image);
            }
            $project->image = $request->file('image')->store('projects', 'public');
        }
    
        $project->save();
    
        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
