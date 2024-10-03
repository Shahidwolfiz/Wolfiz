<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Show the form for creating a new project
    public function create()
    {
        return view('admin.projects.create');
    }

    // Store a newly created project in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Project added successfully!')
                                  ->with('image', $imagePath);
    }

    // Get all projects for API
    public function index()
    {
        $projects = Project::with('links')->get(); // Fetch all projects with links

        // Prepare the data for the API response
        $data = $projects->map(function ($project) {
            return [
                'id' => $project->id,
                'name' => $project->name,
                'description' => $project->description,
                'image_path' => $project->image_path,
                'links' => $project->links->pluck('url'), // Get only the URLs
            ];
        });

        return response()->json($data); // Return as JSON
    }

    // Get all project links for API
    public function getAllLinks()
    {
        $projects = Project::with('links')->get(); // Fetch all projects with links

        $data = $projects->map(function ($project) {
            return [
                'id' => $project->id,
                'name' => $project->name,
                'links' => $project->links->pluck('url'), // Get only the URLs
            ];
        });

        return response()->json($data); // Return as JSON
    }
}
