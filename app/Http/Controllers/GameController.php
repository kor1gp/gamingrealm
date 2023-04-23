<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('welcome', compact('games'));
    }

    public function show($slug)
    {
        $game = Game::where('slug', $slug)->firstOrFail();
        return view('games.' . $slug, compact('game'));
    }
}