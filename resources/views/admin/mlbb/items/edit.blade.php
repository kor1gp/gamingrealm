@extends('layouts.admin-mlbb')


@section('content')
<div class="container-fluid col-md-4">
    <h1 class="mt-4">Edit Item</h1>
    <form method="POST" action="{{ route('admin.mlbb.items.update', $item->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $item->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="icon">Item Icon</label>
            <input type="file" class="form-control" id="icon" name="icon" onchange="previewIcon(this)">
            <img id="icon-preview" src="{{ $item->icon }}" alt="{{ $item->name }}" width="100" height="100" class="mt-2">
        </div>

        <div class="form-group">
            <label for="item_type_id">Item Type</label>
            <select class="form-control" id="item_type_id" name="item_type_id">
                @foreach($itemTypes as $itemType)
                <option value="{{ $itemType->id }}" {{ $item->item_type_id == $itemType->id ? 'selected' : '' }}>{{ $itemType->name }}</option>
                @endforeach

                
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div>
@endsection
@section('scripts')
<script>
    function previewIcon(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('icon-preview').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection