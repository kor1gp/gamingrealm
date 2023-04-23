@extends('layouts.admin-mlbb')


@section('content')
<div class="container-fluid col-md-4">
    <h1 class="mt-4">Edit Emblem</h1>
    <form method="POST" action="{{ route('admin.mlbb.emblems.update', $emblem->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Emblem Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $emblem->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $emblem->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="icon">Emblem Icon</label>
            <input type="file" class="form-control" id="icon" name="icon" onchange="previewIcon(this)">
            <img id="icon-preview" src="{{ $emblem->icon }}" alt="{{ $emblem->name }}" width="100" height="100" class="mt-2">
        </div>

        <div class="form-group">
            <label for="emblem_type_id">Emblem Type</label>
            <select class="form-control" id="emblem_type_id" name="emblem_type_id">
                @foreach($emblemTypes as $emblemType)
                <option value="{{ $emblemType->id }}" {{ $emblem->emblem_type_id == $emblemType->id ? 'selected' : '' }}>{{ $emblemType->name }}</option>
                @endforeach

                
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update emblem</button>
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