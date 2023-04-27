<?php

namespace App\Http\Controllers\Admin\MLBB;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MLBB\Hero;
use App\Models\MLBB\Role;
use App\Models\MLBB\BattleSpell;


class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $heroes = null;
        $roles = Role::all();
        $selected_role = $request->input('role_id');
        if ($selected_role) {
            $heroes = Hero::where('role_id', $selected_role)->orderBy('id','desc')->paginate(10);
        }
        else{
            $heroes = Hero::orderBy('id', 'desc')->paginate(10); // 10 is the number of items per page, you can change it as needed
        }
        
        return view('admin.mlbb.heroes.index', compact('heroes', 'roles', 'selected_role'));
        // return view('admin.mlbb.heroes.index', ['heroes' => $heroes, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $battleSpells = BattleSpell::all();
        return view('admin.mlbb.heroes.create', compact('roles', 'battleSpells'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role_id' => 'required',
            'icon' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $hero = new Hero();
        $hero->name = $request->input('name');
        $hero->role_id = $request->input('role_id');

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = time() . '_' . $icon->getClientOriginalName();
            $icon_path = $icon->storeAs('public/mlbb/heroes', $iconName);
            $icon_url = Storage::url($icon_path);
            $hero->icon = $icon_url;
        }

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_' . $banner->getClientOriginalName();
            $banner_path = $banner->storeAs('public/mlbb/banner', $bannerName);
            $icon_url = Storage::url($banner_path);
            $hero->banner = $icon_url;
        }

        $hero->durability = $request->input('durability');
        $hero->offense = $request->input('offense');
        $hero->control_effect = $request->input('control_effect');
        $hero->difficulty = $request->input('difficulty');

        $hero->save();

        $hero->battleSpells()->sync($request->input('battle_spells', []));

        // return redirect()->route('admin.heroes.additional-data', $hero->id)->with('success', 'Hero created successfully. Now add additional data for the hero.');
       

        return redirect()->route('admin.mlbb.heroes.index')->with('success', 'Hero updated successfully');
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
    public function edit(Hero $hero)
    {
        // $hero = Hero::findOrFail($id);
        $roles = Role::all();
        
        $battleSpells = BattleSpell::all();
        return view('admin.mlbb.heroes.edit', compact('hero', 'roles', 'battleSpells'));

        // return view('admin.mlbb.heroes.edit', ['hero' => $hero, 'roles' => $roles]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'name' => 'required',
            'role_id' => 'required',
            'icon' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $hero->name = $request->input('name');
        $hero->role_id = $request->input('role_id');

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = time() . '_' . $icon->getClientOriginalName();
            $icon_path = $icon->storeAs('public/mlbb/heroes', $iconName);
            $icon_url = Storage::url($icon_path);
            $hero->icon = $icon_url;
        }

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_' . $banner->getClientOriginalName();
            $banner_path = $banner->storeAs('public/mlbb/banner', $bannerName);
            $icon_url = Storage::url($banner_path);
            $hero->banner = $icon_url;
        }

        $hero->durability = $request->input('durability');
        $hero->offense = $request->input('offense');
        $hero->control_effect = $request->input('control_effect');
        $hero->difficulty = $request->input('difficulty');

        $hero->save();

        $hero->battleSpells()->sync($request->input('battle_spells', []));

        // return redirect()->route('admin.heroes.additional-data', $hero->id)->with('success', 'Hero created successfully. Now add additional data for the hero.');
       

        return redirect()->route('admin.mlbb.heroes.index')->with('success', 'Hero updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function weakness($id){
        $hero = Hero::findOrFail($id);
        return view('admin.mlbb.heroes.weaknesses.create', compact('hero'));   
    }
}
