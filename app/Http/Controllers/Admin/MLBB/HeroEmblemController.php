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

class HeroEmblemController extends Controller
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
        return view('admin.mlbb.heroes.emblem', [
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
