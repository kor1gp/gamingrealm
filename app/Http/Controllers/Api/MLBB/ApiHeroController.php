<?php

namespace App\Http\Controllers\Api\MLBB;

use App\Http\Controllers\Controller;
use App\Models\MLBB\Hero;
use Illuminate\Http\Request;

class ApiHeroController extends Controller
{
    
    public function searchHeroes(Request $request, $hero_name)
    {

        
        $query = $request->input('q');
        $selected_weak_against = $request->input('selected_weak_against', []);
        $selected_strong_against = $request->input('selected_strong_against', []);
        $selected_heroes = array_merge($selected_weak_against, $selected_strong_against);
        
        $heroes = Hero::where('name', 'like', '%' . $query . '%')
            ->where('name', '<>', $hero_name) // Exclude self hero
            ->whereNotIn('name', $selected_heroes)
            ->get()
            ->unique('name'); ;
    
        return response()->json($heroes);
    }
    

   
}
