<?php

namespace App\Http\Controllers\Admin\MLBB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MLBB\HeroWeakness;
use App\Models\MLBB\Hero;
use App\Models\MLBB\Item;
use App\Models\MLBB\Emblem;
use App\Models\MLBB\EmblemType;
use App\Models\MLBB\HeroEmblem;

class HeroAdditionalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        
        $hero = Hero::findOrFail($id);
        $heroes = Hero::all(); // Query all the heroes from the database.
        $items = Item::all();
        $weaknesses = $hero->weaknesses;
        $strengths = $hero->strengths;
        $itemCounters = $hero->itemCounters;
        
        return view('admin.mlbb.heroes.additional-data', [
            'hero' => $hero,
            'heroes' => $heroes,
            'weaknesses' => $weaknesses,
            'strengths' => $strengths,
            'items' => $items,
            'itemCounters' => $itemCounters,
            
            

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // $hero = Hero::findOrFail($id);
        // $heroes = Hero::all(); // Query all the heroes from the database.

        // $weaknesses = $hero->weaknesses;
        // return view('admin.mlbb.heroes.weaknesses.create', [
        //     'hero' => $hero,
        //     'weaknesses' => $weaknesses,
        //     'heroes' => $heroes
        // ]);

        // return view('admin.mlbb.heroes.weaknesses.create', compact('hero'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $heroId)
    {
        
        $hero = Hero::findOrFail($heroId);
        $weakHeroIds = $request->input('weak_hero_ids');
        $strongHeroIds = $request->input('strong_hero_ids');
        $itemCounterIds = $request->input('item_counter_ids');
        $emblemIds = $request->input('emblem_ids');
        $hero->weaknesses()->sync($weakHeroIds);
        $hero->strengths()->sync($strongHeroIds);
        $hero->itemCounters()->sync($itemCounterIds);

        return redirect()->route('admin.mlbb.heroes.index')->with('success', 'Hero weaknesses saved successfully.');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
