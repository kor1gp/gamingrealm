<?php

namespace App\Http\Controllers\Admin\MLBB;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MLBB\Item;
use App\Models\MLBB\ItemType;
class ItemController extends Controller
{
    public function index(Request $request)
    {
        
        $selected_type = $request->input('item_type_id');
        if ($selected_type) {
            
            $items = Item::where('item_type_id', $selected_type)->orderBy('id','desc')->paginate(10);
        }
        else{
            $items = Item::orderBy('id','desc')->paginate(10);
        }

        


        $itemTypes = ItemType::all();
        
        return view('admin.mlbb.items.index', compact('items', 'itemTypes', 'selected_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemTypes = ItemType::all();
        return view('admin.mlbb.items.create', compact('itemTypes'));

        // return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $icon = $request->file('icon');
        $icon_name = time() . '_' . $icon->getClientOriginalName();
        $icon_path = $icon->storeAs('public/mlbb/items', $icon_name);
        $icon_url = Storage::url($icon_path);

          
        $item = new Item();
        $item->name = $request->name;
        $item->icon = $icon_url;
        $item->description = $request->description;
        $item->item_type_id = $request->input('item_type_id');

        $item->save();

        return redirect()->route('admin.mlbb.items.index')->with('success', 'Item added successfully');
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
    public function edit(Item $item)
    {
        $itemTypes = ItemType::all();
        return view('admin.mlbb.items.edit', compact('item', 'itemTypes'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string', // Add this line
        ]);

        $item->name = $request->name;
        $item->item_type_id = $request->input('item_type_id');
        $item->description = $request->description;
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $icon_name = time() . '_' . $icon->getClientOriginalName();
            $icon_path = $icon->storeAs('public/mlbb/items', $icon_name);
            $icon_url = Storage::url($icon_path);

            $item->icon = $icon_url;
        }

        $item->save();

        return redirect()->route('admin.mlbb.items.index')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
