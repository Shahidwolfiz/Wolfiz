<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Models\SocialIcon;

class AdminController extends Controller
{
    public function index()
    {
        
        $projects = Project::with('links')->get();
        return view('admin.projects.index', compact('projects'));
    }

    // New method to show the create project form
    public function create()
    {
        return view('admin.projects.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function addLink(Request $request, Project $project)
    {
        $request->validate(['url' => 'required|url']);
        $project->links()->create($request->only('url'));
        return redirect()->back();
    }

    public function socialIconsIndex()
    {
        $socialIcons = SocialIcon::all();
        return view('admin.projects.social-icons.index', compact('socialIcons'));
    }

    public function storeSocialIcon(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'url' => 'required|url',
        ]);
        
        SocialIcon::create($request->only('name', 'icon', 'url'));
        return redirect()->back();
    }
}
