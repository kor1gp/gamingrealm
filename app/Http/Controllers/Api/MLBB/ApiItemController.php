<?php

namespace App\Http\Controllers\Api\MLBB;

use App\Http\Controllers\Controller;
use App\Models\MLBB\Item;
use Illuminate\Http\Request;

class ApiItemController extends Controller
{
    

    public function searchItems(Request $request)
    {
        $query = $request->input('q');
        
        $items = Item::where('name', 'like', '%' . $query . '%')
            ->get();
    
        return response()->json($items);
    }
    

   
}
