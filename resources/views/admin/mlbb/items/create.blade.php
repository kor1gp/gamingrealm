@extends('layouts.admin-mlbb')



@section('content')
<div class="container-fluid col-md-4">
    <h1 class="mt-4">Add New Item</h1>
    <form method="POST" action="{{ route('admin.mlbb.items.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Item Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>

        <!-- Image -->
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="file" class="form-control-file" id="icon" name="icon" onchange="previewIcon(this)">
            <img id="icon-preview" src="{{asset('images/default_image.png')}}" alt="Item Icon Preview" class="mt-2" style="width: 100px; height: 100px;">
        </div>

    

        <div class="form-group">
            <label for="item_type_id">Item Type</label>
            <select class="form-control" id="item_type_id" name="item_type_id">
                @foreach($itemTypes as $itemType)
                    <option value="{{ $itemType->id }}"> {{ $itemType->name }}</option>
                @endforeach
            </select>
        </div>
        

        <button type="submit" class="btn btn-primary">Save Item</button>
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