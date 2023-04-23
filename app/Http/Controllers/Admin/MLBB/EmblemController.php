<?php

namespace App\Http\Controllers\Admin\MLBB;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MLBB\Emblem;
use App\Models\MLBB\EmblemType;
class EmblemController extends Controller
{
    public function index(Request $request)
    {
        
        $selectedType = $request->input('emblem_type_id');
        if ($selectedType) {
            
            $emblems = Emblem::where('emblem_type_id', $selectedType)->paginate(10);
        }
        else{
            $emblems = Emblem::paginate(10);
        }

        


        $emblemTypes = EmblemType::all();
        
        return view('admin.mlbb.emblems.index', compact('emblems', 'emblemTypes', 'selectedType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $emblemTypes = EmblemType::all();
        return view('admin.mlbb.emblems.create', compact('emblemTypes'));

        // return view('admin.emblems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $request->validate([
            'name' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $icon = $request->file('icon');
        $icon_name = time() . '_' . $icon->getClientOriginalName();
        $icon_path = $icon->storeAs('public/emblems', $icon_name);
        $icon_url = Storage::url($icon_path);

          
        $emblem = new Emblem();
        $emblem->name = $request->name;
        $emblem->icon = $icon_url;
        $emblem->description = $request->description;
        $emblem->emblem_type_id = $request->input('emblem_type_id');

        $emblem->save();

        return redirect()->route('admin.mlbb.emblems.index')->with('success', 'emblem added successfully');
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
    public function edit(emblem $emblem)
    {
        $emblemTypes = emblemType::all();
        return view('admin.mlbb.emblems.edit', compact('emblem', 'emblemTypes'));
    }

    public function update(Request $request, emblem $emblem)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string', // Add this line
        ]);

        $emblem->name = $request->name;
        $emblem->emblem_type_id = $request->input('emblem_type_id');
        $emblem->description = $request->description;
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $icon_name = time() . '_' . $icon->getClientOriginalName();
            $icon_path = $icon->storeAs('public/mlbb/emblems', $icon_name);
            $icon_url = Storage::url($icon_path);

            $emblem->icon = $icon_url;
        }

        $emblem->save();

        return redirect()->route('admin.mlbb.emblems.index')->with('success', 'emblem updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
