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

class HeroEmblemBuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($heroId)
    {

        
        $hero = Hero::findOrFail($heroId);
        
        $emblems = Emblem::all();
        $emblemTypes = EmblemType::all();
        $heroEmblems = HeroEmblem::where('hero_id', $heroId)->get();
        return view('admin.mlbb.heroes.emblem-build', [
            'hero' => $hero,
            
            'emblems' => $emblems,
            'emblemTypes' => $emblemTypes,
            'heroEmblems' => $heroEmblems
            
            

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
        
        // dd($request);

        $i=0;
        foreach($request->emblems as $emblem){
            $heroEmblem = new HeroEmblem([
            
                'hero_id' => $heroId,
                'emblems' => json_encode($emblem),
                'emblem_type_id' => $request->emblem_type_ids[$i]
                
            ]);
    
            $heroEmblem->save();
            $i++;
        }
        
        
        
        return response()->json(['status'=>200,"message"=>"success"]);
        // $hero = Hero::findOrFail($heroId);
        // $weakHeroIds = $request->input('weak_hero_ids');
        // $strongHeroIds = $request->input('strong_hero_ids');
        // $itemCounterIds = $request->input('item_counter_ids');
        // $emblemIds = $request->input('emblem_ids');
        // $hero->weaknesses()->sync($weakHeroIds);
        // $hero->strengths()->sync($strongHeroIds);
        // $hero->itemCounters()->sync($itemCounterIds);
        // $hero->emblems()->sync($emblemIds);

        // return redirect()->route('admin.mlbb.heroes.index')->with('success', 'Hero weaknesses saved successfully.');

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
        // dd($request);
        // $heroEmblem = HeroEmblem::where('hero_id', $heroId)->update(['emblems'=>$request->emblems]);
        // return response()->json(['status'=>200,"message"=>"success"]);
        $i = 0;
        foreach ($request->emblems as $emblem) {
            if(isset($request->hero_emblem[$i])){
                $heroEmblem = HeroEmblem::where('hero_id', $heroId)
                                    ->where('id', $request->hero_emblem[$i]['id'])
                                    ->first();

                $heroEmblem->emblems = json_encode($emblem);
                $heroEmblem->emblem_type_id = $request->emblem_type_ids[$i];
                $heroEmblem->save();

            }
            
    
           
            else {
                // Insert a new row
                $heroEmblem = new HeroEmblem([
                    'hero_id' => $heroId,
                    'emblems' => json_encode($emblem),
                    'emblem_type_id' => $request->emblem_type_ids[$i]
                ]);
                $heroEmblem->save();
            }
            $i++;
        }
    
        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
