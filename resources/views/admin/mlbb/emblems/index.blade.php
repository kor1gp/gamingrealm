@extends('layouts.admin-mlbb')

@section('content')
<!-- Your content here -->
    <div class="container-fluid">
        <h1 class="mt-4">Manage Emblems</h1>
        <div class="mb-3">
            <a href="{{ route('admin.mlbb.emblems.create') }}" class="btn btn-primary">Add Emblems</a>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Icon</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emblems as $emblem)
                    <tr>
                        <td class="align-middle"> <img src="{{ $emblem->icon }}" alt="{{ $emblem->name }}" width="50"></td>
                        <td class="align-middle">{{ $emblem->name }}</td>
                        <td class="align-middle">{{ $emblem->emblemType->name }}</td>
                        <td class="align-middle">
                            <a href="{{ route('admin.mlbb.emblems.edit', $emblem->id) }}" class="btn btn-primary">Edit</a>
                            <!-- Add delete button if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $emblems->links() }}
    </div>




@endsection