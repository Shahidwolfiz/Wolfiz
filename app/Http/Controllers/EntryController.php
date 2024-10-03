<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class EntryController extends Controller
{
    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name.*' => 'required|string|max:255',
            'description.*' => 'required|string',
            'video.*' => 'nullable|url',
            'image.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'background_color' => 'required|string',
        ]);

        foreach ($validatedData['name'] as $index => $name) {
            $entry = new Entry();
            $entry->name = $name;
            $entry->description = $validatedData['description'][$index];
            $entry->video = $validatedData['video'][$index] ?? null;

            if (isset($validatedData['image'][$index])) {
                $imagePath = $validatedData['image'][$index]->store('images', 'public');
                $entry->image = $imagePath;
            }

            $entry->background_color = $validatedData['background_color'];
            $entry->save();
        }

        return redirect()->route('entries.index')->with('success', 'Entries added successfully!');
    }

    public function index()
    {
        $entries = Entry::all();
        return view('entries.index', compact('entries'));
    }

    // API endpoint to fetch entries
    public function apiIndex()
    {
        return response()->json(Entry::all());
    }

    // API endpoint to store entries
    public function apiStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'background_color' => 'required|string',
        ]);

        $entry = new Entry();
        $entry->name = $validatedData['name'];
        $entry->description = $validatedData['description'];
        $entry->video = $validatedData['video'] ?? null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $entry->image = $imagePath;
        }

        $entry->background_color = $validatedData['background_color'];
        $entry->save();

        return response()->json($entry, 201);
    }
}
