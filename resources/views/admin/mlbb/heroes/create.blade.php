@extends('layouts.admin-mlbb')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Hero</div>

                <div class="card-body">
                    <form action="{{ route('admin.mlbb.heroes.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">Hero Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <select class="form-control" id="role_id" name="role_id" required>
                                        <option value="">Select a role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Hero Icon</label>
                                    <input type="file" class="form-control-file" id="icon" name="icon" accept="image/*" required>
                                    <img src="{{asset('images/default_image.png')}}" alt="Icon" width="50" height="50" id="icon-preview">
                                </div>
                                <div class="form-group">
                                    <label for="banner">Hero Banner</label>
                                    <input type="file" class="form-control-file" id="banner" name="banner" accept="image/*" required>
                                    <img src="{{asset('images/default_image.png')}}" alt="Banner" width="150" height="50" id="banner-preview">
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <!-- Add more input fields for other hero properties if needed -->
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
                            <div class="row ">
                                @foreach($battleSpells as $index => $battleSpell)
                                    <div class="col-md-6">
                                        <div class="form-check mt-2 align-middle">
                                            <input class="form-check-input" type="checkbox" name="battle_spells[]" value="{{ $battleSpell->id }}" id="battle_spell_{{ $battleSpell->id }}">
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
                        
                        
                        
                        
                                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
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
