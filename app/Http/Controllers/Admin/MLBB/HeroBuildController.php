<?php

namespace App\Http\Controllers\Admin\MLBB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\MLBB\Hero;
use App\Models\MLBB\HeroItemBuild;
use App\Models\MLBB\Item;
class HeroBuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($heroId)
    {

        
        $hero = Hero::findOrFail($heroId);
        $heroItemBuilds = HeroItemBuild::where('hero_id', $heroId)->first();
        $items = Item::all();
        
        return view('admin.mlbb.heroes.build', ['hero' => $hero, 'heroItemBuilds' => $heroItemBuilds, 'items' => $items]);
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
        // $build = [];
        // $build[0] = [];
        // $build[1] = [];
        // $build[2] = [];
        // $build[3] = [];
        
        // dd(json_decode($request->builds));
        
        // if(isset($request->item1_ids) && count($request->item1_ids) > 0){
        //     $build[0] = $request->item1_ids;
        // }
        // if(isset($request->item2_ids) && count($request->item2_ids) > 0){
        //     $build[1] = $request->item2_ids;
        // }
        // if(isset($request->item3_ids) && count($request->item3_ids) > 0){
        //     $build[2] = $request->item3_ids;
        // }
        // if(isset($request->item4_ids) && count($request->item4_ids) > 0){
        //     $build[3] = $request->item4_ids;
        // }

        $heroItemBuild = new HeroItemBuild([
            'hero_id' => $heroId,
            'builds' => $request->builds
        ]);
        $heroItemBuild->save();

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
        // dd(json_decode($request->builds));
        

        $heroItemBuild = HeroItemBuild::where('hero_id', $heroId)->first();
        $heroItemBuild->builds = $request->builds;
        $heroItemBuild->save();
        return response()->json(['status'=>200,"message"=>"success"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
