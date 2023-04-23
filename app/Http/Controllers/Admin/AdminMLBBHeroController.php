<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminMLBBHeroController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mlbb.heroes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'durability' => 'required|integer|min:1|max:10',
            'offense' => 'required|integer|min:1|max:10',
            'control_effect' => 'required|integer|min:1|max:10',
            'difficulty' => 'required|integer|min:1|max:10',
        ]);

        $icon = $request->file('icon')->store('public/icons');
        $banner = $request->file('banner')->store('public/banners');

        $hero = new Hero([
            'name' => $request->name,
            'icon' => $icon,
            'banner' => $banner,
            'durability' => $request->durability,
            'offense' => $request->offense,
            'control_effect' => $request->control_effect,
            'difficulty' => $request->difficulty,
        ]);

        $hero->save();

        return redirect()->route('admin.mlbb.heroes.index')->with('success', 'Hero added successfully.');
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
    public function update(Request $request, string $id)
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

