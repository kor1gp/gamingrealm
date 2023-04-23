<?php

namespace App\Http\Controllers\Api\MLBB;

use App\Http\Controllers\Controller;
use App\Models\MLBB\Emblem;
use Illuminate\Http\Request;

class ApiEmblemController extends Controller
{
    

    public function searchEmblems(Request $request)
    {
        $query = $request->input('q');
        
        $emblems = Emblem::where('name', 'like', '%' . $query . '%')
            ->get();
    
        return response()->json($emblems);
    }
    
    public function getEmblemByType(Request $request){
        $type_id = $request->input('type_id');
        $emblems = Emblem::where('emblem_type_id', $type_id)->get();
        return response()->json($emblems);
    }

   
}