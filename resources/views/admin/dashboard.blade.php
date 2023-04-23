@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="row">
            @foreach ($games as $game)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $game->name }}</h5>
                            <p class="card-text">{{ $game->description }}</p>
                            {{-- <a href="{{ route('admin.games.show', ['slug' => $game->slug]) }}" class="btn btn-primary">Manage</a> --}}
                            <a href="{{ route('admin.dashboard', ['slug' => $game->slug]) }}" class="btn btn-primary">Manage</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
