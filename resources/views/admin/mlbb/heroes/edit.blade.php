@extends('layouts.admin-mlbb')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Edit Hero</h2>
            <form action="{{ route('admin.mlbb.heroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Hero Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $hero->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select class="form-control" id="role_id" name="role_id" required>
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $hero->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="icon">Hero Icon</label>
                            <input type="file" class="form-control-file" id="icon" name="icon" accept="image/*">
                            <img class="mt-2" src="{{ asset($hero->icon) }}" alt="{{ $hero->name }} Icon" width="50" height="50" id="icon-preview">
        
                        </div>
                        <div class="form-group">
                            <label for="banner">Hero Banner</label>
                            <input type="file" class="form-control-file" id="banner" name="banner" accept="image/*">
                            <img class="mt-2" src="{{ asset(    $hero->banner) }}" alt="{{ $hero->name }} Banner" width="250" height="100" id="banner-preview">
        
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="durability">Durability</label>
                            <input type="number" class="form-control" name="durability" id="durability" value="{{ old('durability', $hero->durability ?? '') }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="offense">Offense</label>
                            <input type="number" class="form-control" name="offense" id="offense" value="{{ old('offense', $hero->offense ?? '') }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="control_effect">Control Effect</label>
                            <input type="number" class="form-control" name="control_effect" id="control_effect" value="{{ old('control_effect', $hero->control_effect ?? '') }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="difficulty">Difficulty</label>
                            <input type="number" class="form-control" name="difficulty" id="difficulty" value="{{ old('difficulty', $hero->difficulty ?? '') }}">
                        </div>
                    </div>
                </div>
                

                
                
                
                <div class="form-group">
                    <label for="battle_spells">Battle Spells</label>
                    <div class="row">
                        @foreach($battleSpells as $index => $battleSpell)
                            <div class="col-md-6 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="battle_spells[]" value="{{ $battleSpell->id }}" id="battle_spell_{{ $battleSpell->id }}" {{ $hero->battleSpells->contains($battleSpell) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="battle_spell_{{ $battleSpell->id }}">
                                        <img src="{{ asset('images/mlbb/battle_spell/'.$battleSpell->icon) }}" alt="{{ $battleSpell->name }}" class="mr-2" width="32" height="32">
                                        {{ $battleSpell->name }}
                                    </label>
                                </div>
                            </div>
                            @if (($index + 1) % 2 === 0)
                                </div><div class="row">
                            @endif
                        @endforeach
                    </div>
                </div>
                
                
                
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('icon').addEventListener('change', function() {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('#icon-preview').src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    });

    document.getElementById('banner').addEventListener('change', function() {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('#banner-preview').src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection

