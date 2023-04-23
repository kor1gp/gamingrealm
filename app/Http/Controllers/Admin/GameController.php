<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function dashboard()
    {
        $games = Game::all();
        return view('admin.dashboard', compact('games'));
    }

    public function show($slug)
    {
        $game = Game::where('slug', $slug)->firstOrFail();
        return view('admin.games.show', compact('game'));
    }

    public function gameAdminPanel($slug)
    {
        $game = Game::where('slug', $slug)->firstOrFail();
        $view = '';
        switch ($slug) {
            case 'mlbb':
                $view = 'admin.mlbb.dashboard';
                break;
            case 'freefiremax':
                $view = 'admin.freefiremax.dashboard';
                break;
            case 'diabloiv':
                $view = 'admin.diabloiv.dashboard';
                break;
            default:
                abort(404);
        }

        return view($view, compact('game'));
        // return view('admin.game-admin-panel', compact('game'));
    }
}
