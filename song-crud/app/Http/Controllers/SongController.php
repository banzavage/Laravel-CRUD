<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    /**
     * Display a listing of all songs.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Fetch all songs from the database
        $songs = Song::all();
        return response()->json($songs);
    }

    /**
     * Store a newly created song in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'required|string|max:255',
            'year_release' => 'required|integer',
            'genre' => 'required|string|max:255',
        ]);

        // Create a new song record in the database
        Song::create([
            'title' => $request->title,
            'singer' => $request->singer,
            'year_release' => $request->year_release,
            'genre' => $request->genre,
        ]);

        // Return a success message
        return response()->json(['message' => 'Song added successfully'], 201);
    }
}
