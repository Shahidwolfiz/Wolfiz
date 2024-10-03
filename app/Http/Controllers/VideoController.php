<?php
namespace App\Http\Controllers;

use App\Models\Video; // Make sure this is correct
use App\Models\Project; // Import the Project model
use App\Models\SocialIcon; // Import the SocialIcon model
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all(); // Retrieve all videos
        $projects = Project::all(); // Retrieve all projects
        $socialIcons = SocialIcon::all(); // Retrieve all social icons

        return view('user.projects.index', compact('videos', 'projects', 'socialIcons')); // Pass to the view
    }

    public function uploadVideo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4,avi,mov,mkv|max:20480', // Allows multiple formats and increased size
        ]);

        $video = new Video;
        $video->title = $request->title;

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('videos', 'public');
            $video->video = $path;
        }

        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video uploaded successfully!');
    }

    // Step 2: Add this method to fetch social icons
    public function getSocialIcons()
    {
        $socialIcons = SocialIcon::all(); // Retrieve all social icons
        return response()->json($socialIcons); // Return as JSON
    }
}
