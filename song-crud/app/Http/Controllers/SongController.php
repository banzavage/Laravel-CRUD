<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    // Fetch all songs
    public function index()
    {
        return response()->json(Song::all());
    }

    // Store a new song
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'required|string|max:255',
            'year_release' => 'required|integer',
            'genre' => 'required|string|max:255',
        ]);

        $song = Song::create($request->all());

        return response()->json(['message' => 'Song added successfully', 'song' => $song], 201);
    }

    // Update an existing song
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'singer' => 'required|string|max:50',
            'year_release' => 'required|integer',
            'genre' => 'required|string|max:50',
        ]);

        $song = Song::findOrFail($id);
        $song->update($request->all());

        return response()->json(['message' => 'Song updated successfully', 'song' => $song], 200);
    }

    // Delete a song
    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();

        return response()->json(['message' => 'Song deleted successfully'], 200);
    }
}
