@extends('layouts.admin-mlbb')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="mb-3 mt-3 ml-3">
                    <a href="{{ route('admin.mlbb.heroes.create') }}" class="btn btn-primary">Add Hero</a>
                </div>
                
                <div class="mb-3 mt-3 pl-3">
                    <form method="GET" action="{{ route('admin.mlbb.heroes.index') }}">
                    
                        <div class="row">
                            <div class="col-md-4">
                                <label for="role_id" class="form-label">Filter by Role:</label>
                                <select name="role_id" id="role_id" class="form-select" onchange="this.form.submit()">
                                    <option value="">All Roles</option>
                                    
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $selected_role == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Icon</th>
                                <th>Banner</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($heroes as $hero)
                                <tr >
                                    <td class="align-middle">{{ $hero->id }}</td>
                                    <td class="align-middle">
                                        <img src="{{ asset($hero->icon) }}" alt="{{ $hero->name }} Icon" width="50" height="50">
                                    </td>
                                    <td class="align-middle">
                                        <img src="{{ asset($hero->banner) }}" alt="{{ $hero->name }} Banner" width="250" height="100">
                                    </td>
                                    <td class="align-middle">{{ $hero->name }}</td>
                                    <td class="align-middle">{{ $hero->role->name }}</td>
                                    <td class="align-middle">
                                        {{-- Add action buttons for edit and delete here --}}
                                        <a href="{{ route('admin.mlbb.heroes.edit', $hero->id) }}" class="btn btn-sm btn-warning mt-2">Edit</a> 
                                        <a href="{{ route('admin.mlbb.heroes.additional-data', $hero->id) }}" class="btn btn-sm btn-warning mt-2">Additional Data</a> 
                                        <a href="{{ route('admin.mlbb.heroes.emblem-build', $hero->id) }}" class="btn btn-sm btn-warning mt-2">Emblem & Build</a> 
                                    

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    {{ $heroes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
