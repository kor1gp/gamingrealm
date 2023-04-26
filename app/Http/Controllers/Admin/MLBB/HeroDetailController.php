<?php

namespace App\Http\Controllers\Admin\MLBB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\MLBB\Hero;
use App\Models\MLBB\HeroItemBuild;
use App\Models\MLBB\Item;
use App\Models\MLBB\Role;
use App\Models\MLBB\HeroEmblem;
use App\Models\MLBB\Emblem;
use App\Models\MLBB\BattleSpell;
class HeroDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($heroId)
    {

        $roles = Role::all();
        $items = Item::all();
        $emblems = Emblem::all();
        $hero = Hero::findOrFail($heroId);
        $battleSpells = $hero->battleSpells;
        $weaknesses = $hero->weaknesses;
        $strengths = $hero->strengths;
        $itemCounters = $hero->itemCounters;
        $heroEmblems = HeroEmblem::where('hero_id', $heroId)->get();
        $heroItemBuilds = HeroItemBuild::where('hero_id', $heroId)->get();
        
        return view('admin.mlbb.heroes.detail', [
            'hero' => $hero, 
            'roles' => $roles,
            'battleSpells' => $battleSpells,
            'weaknesses' => $weaknesses,
            'strengths' => $strengths,
            'itemCounters' => $itemCounters,
            'items' => $items,
            'emblems' => $emblems,
            'heroEmblems' => $heroEmblems,
            'heroItemBuilds' => $heroItemBuilds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $heroId)
    {
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function update(Request $request, string $heroId)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
