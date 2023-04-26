@extends('layouts.admin-mlbb')

@section('content')
<div class="container-fluid pb-3 ">
    <div class="row mt-3">
        <h1 class="mt-4 ">{{$hero->name}}</h1>
        <img class="ml-3" src="{{$hero->icon}}" width="100" height="100"/>
    </div>
    
    <div class="row">
        
            <div class="col-md-3">
                <div class="form-group">
                    <p>Name : {{ $hero->name }} <p>
                </div>
                <div class="form-group">
                    <label for="role_id">Role : 
                        @foreach($roles as $role)
                                @if($hero->role_id == $role->id)
                                {{ $role->name }}
                                @endif
                        @endforeach

                    </label>
                </div>

                <div class="form-group">
                    <p>Durability : {{$hero->durability ?? '0'}}</p>
                    <p>Offense : {{$hero->offense ?? '0'}}</p>
                    <p>Control Effect : {{$hero->control_effect ?? '0'}}</p>
                    <p>Difficulty : {{$hero->difficulty ?? '0'}}</p>
                </div>

                <div class="form-group align-middle">
                    
                    <img class="mt-2" src="{{ asset($hero->icon) }}" alt="{{ $hero->name }} Icon" width="50" height="50" id="icon-preview">
                    <div>
                        <img class="mt-2" src="{{ asset(    $hero->banner) }}" alt="{{ $hero->name }} Banner" width="250" height="100" id="banner-preview">
                    </div>
                    
                </div>
                

                <div class="form-group">
                    <label for="battle_spells">Battle Spells</label>
                    @foreach($battleSpells as $battleSpell)
                            <div class="col-md-6 mt-2">
                                <div class="form-check">
                                    <label class="form-check-label" for="battle_spell_{{ $battleSpell->id }}">
                                        <img src="{{ asset('images/mlbb/battle_spell/'.$battleSpell->icon) }}" alt="{{ $battleSpell->name }}" class="mr-2" width="32" height="32">
                                        {{ $battleSpell->name }}
                                    </label>
                                </div>
                            </div>
                            
                        @endforeach
                    <div class="row">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p class="text-danger h3">Weak Against</p>
                <div class="row">
                    
                    @foreach($weaknesses as $weakness)
                        <div class="form-group ml-2 hero-search-results">
                            <div class="card p-2">
                                <img src="{{ asset($weakness->icon) }}" width="64" height="64"/>
                                <p>{{ $weakness->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="text-success h3">Strong Against</p>
                <div class="row">
                    @foreach($strengths as $strength)
                        <div class="form-group ml-2 hero-search-results">
                            <div class="card p-2">
                                <img src="{{ asset($strength->icon) }}" width="64" height="64"/>
                                <p>{{ $strength->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="text-danger h3">Item Counter</p>
                <div class="row">
                    @foreach($itemCounters as $itemCounter)
                        @foreach($items as $item)
                            @if($itemCounter->id == $item->id)
                                <div class="form-group ml-2 hero-search-results">
                                    <div class="card p-2">
                                        <img src="{{ asset($item->icon) }}" width="64" height="64"/>
                                        <p>{{ $item->name }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                
            </div>

            <div class="col-md-5">
                <div class="row mt-3">
                    <p>Emblems</p>
                </div>
                @foreach($heroEmblems as $heroEmblem)
                    <div class="row mt-2">
                    @foreach(json_decode($heroEmblem->emblems) as $em)
                        
                        @foreach($emblems as $emblem)
                            @if($em->id == $emblem->id)
                                <img class="ml-2" src="{{ asset($emblem->icon) }}" width="64" height="64"/>
                            @endif
                            
                        @endforeach
                        
                    @endforeach
                    </div>
                @endforeach

                
                @foreach($heroItemBuilds as $index =>  $build)
                    
                    <div class="row mt-2">
                        @php
                            $buildsArray = json_decode($build->builds, true);
                        @endphp
                        @foreach($buildsArray as $index => $builds)
                            <div class="row w-100">
                                @if(count($builds)>0)
                                <div class="w-100 mt-5">
                                    <p> Build {{$index+1}}</p>
                                </div>
                                @endif
                                @foreach($builds as $buildId)
                                    
                                    @foreach($items as $item)
                                        @if($item->id == $buildId)
                                        <img class="ml-2" src="{{ asset($item->icon) }}" width="64" height="64"/>
                                            @break
                                        @endif
                                    @endforeach
                                    
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    
                @endforeach
            </div>
        </div>
        
    </div>
        
</div>



@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

           

            
        });
        
       
    </script>
    
@endsection