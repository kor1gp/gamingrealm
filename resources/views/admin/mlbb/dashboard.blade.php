@extends('layouts.admin-mlbb')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <p>Welcome to the admin dashboard!</p>

                    <div class="list-group">
                        <a href="{{ route('admin.mlbb.heroes.index') }}" class="list-group-item list-group-item-action">Manage Heroes</a>                        
                    </div>
                    <div class="list-group mt-3">
                        <a href="{{ route('admin.mlbb.items.index') }}" class="list-group-item list-group-item-action">Manage Items</a>                        
                    </div>
                    <div class="list-group mt-3">
                        <a href="{{ route('admin.mlbb.emblems.index') }}" class="list-group-item list-group-item-action">Manage Emblems</a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
