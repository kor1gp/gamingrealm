@extends('layouts.admin-mlbb')

@section('content')
<!-- Your content here -->
    <div class="container-fluid">
        <h1 class="mt-4">Items</h1>
        <div class="mb-3">
            <a href="{{ route('admin.mlbb.items.create') }}" class="btn btn-primary">Add Item</a>
        </div>
        <div class="mb-3 mt-3 pl-3">
            <form method="GET" action="{{ route('admin.mlbb.items.index') }}">
            
                <div class="row">
                    <div class="col-md-4">
                        <label for="item_type_id" class="form-label">Filter by Type:</label>
                        <select name="item_type_id" id="item_type_id" class="form-select" onchange="this.form.submit()">
                            <option value="">All Type</option>
                            {{-- @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $selected_role == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach --}}
                            @foreach($itemTypes as $type)
                                <option value="{{ $type->id }}" {{ $selected_type == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
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
                @foreach($items as $item)
                    <tr>
                        <td class="align-middle"> <img src="{{ $item->icon }}" alt="{{ $item->name }}" width="50"></td>
                        <td class="align-middle">{{ $item->name }}</td>
                        <td class="align-middle">{{ $item->itemType->name }}</td>
                        <td class="align-middle">
                            <a href="{{ route('admin.mlbb.items.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <!-- Add delete button if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
    </div>




@endsection