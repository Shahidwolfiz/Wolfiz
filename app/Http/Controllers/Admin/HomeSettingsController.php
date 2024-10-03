<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSettingsController extends Controller
{
    public function edit()
    {
        $settings = HomePageSetting::first();
        return view('admin.projects.home-settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'background_video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:20000',
        ]);

        $settings = HomePageSetting::firstOrCreate([]);

        if ($request->hasFile('background_video')) {
            // Delete the old video if it exists
            if ($settings->background_video) {
                Storage::delete($settings->background_video);
            }

            $path = $request->file('background_video')->store('background_videos');
            $settings->background_video = $path;
        }

        $settings->save();

        return redirect()->back()->with('success', 'Background video updated successfully.');
    }
}
