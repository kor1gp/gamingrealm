@extends('layouts.admin-mlbb')

@section('content')
<div class="container-fluid pb-3 ">
    <div class="row mt-3">
        <h1 class="mt-4 ">Emblems for {{$hero->name}}</h1>
        <img class="ml-3" src="{{$hero->icon}}" width="100" height="100"/>
    </div>
    
    <div class="row ">
        <div class="col-md-6">
            @for ($i = 1; $i <= 4; $i++)
            <!-- Item Build -->
            <div class="form-group">
                <label for="strong_against">Build {{$i}}</label>
                <input type="text" class="form-control search-item" data-id="{{$i}}" placeholder="Search item to heroe build" data-target="#item{{$i}}_results">
                <div class="item-search-results" id="item{{$i}}_results"></div>
                <div class="row item-search-results" id="selected_item{{$i}}"></div>
            </div>

            <div id="selected-item{{$i}}">
            </div>
            @endfor
        </div>

    </div>

    <div id="btn-save-data"  class="btn btn-primary mt-3 " data-hero-id="{{$hero->id}}">Save Data</div>
    {{-- <button type="submit" class="btn btn-primary mt-3">Save Data</button> --}}
    
</div>



@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            const heroItemBuilds = @json($heroItemBuilds);
            let builds = [];
            builds[0] = [];
            builds[1] = [];
            builds[2] = [];
            builds[3] = [];
            // console.log();
            const items = @json($items);
            let isUpdate = false;
            if(heroItemBuilds != null){
                isUpdate = true;
                builds = JSON.parse(heroItemBuilds.builds);
                // console.log(parsedString);

                // builds = JSON.parse(parsedString);

                // builds[0] = jsonArray[0][0] !== undefined ? jsonArray[0][0] : [];
                // builds[1] = jsonArray[1][0] !== undefined ? jsonArray[1][0] : [];
                // builds[2] = jsonArray[2][0] !== undefined ? jsonArray[2][0] : [];
                // builds[3] = jsonArray[3][0] !== undefined ? jsonArray[3][0] : [];
                
                renderItemBuilds();
            }
            
            function renderItemBuilds() {
                console.log(builds[0]);
                let id = 1;
                

                builds.forEach((build) => {
                    let index = 0
                    
                    build.forEach((buildId) =>{
                        
                        items.forEach((item) =>{
                            if(item.id == buildId){
                                createItemElement(item, id, index);
                                { return; }
                            }
                            
                        });
                        index++;
                    });
                    
                    
                    // console.log(id);
                    id++;
                });
            }

            function createItemElement(item, id, index) {
                console.log(item)
                let target = $(this).closest('.item-search-results').next();
                
                
                let hiddenInput =  `<input type="hidden" name="item${id}_ids[]" value="${item.id}">`;
                $('#selected-item'+id).append(hiddenInput);
                let html = `
                <div class="col-2 selected-item${id} pr-0 mt-2">
                    <div class="card  weak-against-card">
                        <img src="${item.icon}" class="card-img-top mt-2" alt="${item.name}" style="max-width: 64px; max-height: 64px;">
                        <div class="card-body">
                            <p class="card-title ellipsis-2">${item.name}</p>
                            <button type="button" data-item-id="${item.id}" data-index="${index}" data-id="${id}" class="btn  btn-danger remove-item p-1">Remove</button>
                        </div>
                    </div>
                </div>`;
            
                $('#selected_item'+id).append(html);
                
            }


            $('.search-item').on('input', function() {
                let query = $(this).val();
                let target = $($(this).data('target'));
                let id = $(this).data('id');
                console.log(id);
                if (query.length < 2) {
                    target.html('');
                    return;
                }

                $.ajax({
                    url: '{{ route('api.search-items') }}',
                    data: {
                        q: query,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        let html = '<div class="row mt-2 ">';
                        let index = 0;
                        $.each(response, function(index, item) {
                            html += `
                                
                                <div class="col-2 pr-0 selected-item${id} ">
                                    <div class="card ">
                                        <img src="${item.icon}" class="card-img-top mt-2" alt="${item.name}" style="max-width: 64px; max-height: 64px;">
                                        <div class="card-body">
                                            <p class="card-title ellipsis-2">${item.name}</p>
                                            <button type="button" class="btn btn-primary select-item p-1" data-id="${id}" data-index="${index}" data-item-id="${item.id}" data-item-name="${item.name}" data-item-icon="${item.icon}">Select</button>
                                        </div>
                                    </div>
                                
                                </div>`;

                            index++;

                        });

                        target.html(html);
                    }
                });
            });

            $('.item-search-results').on('click', '.select-item', function() {
                let id = $(this).data('id');
                let itemId = $(this).data('item-id');
                let itemName = $(this).data('item-name');
                let itemIcon = $(this).data('item-icon');
                let target = $(this).closest('.item-search-results').next();
                let index = builds[id-1].length;
                builds[id-1].push(itemId);
                
                // Check if the hero is already selected by name
                let existingItem = target.find('.card-title:contains("' + itemName + '")');
                if (existingItem.length > 0) {
                    alert('This item is already selected.');
                    return;
                }

                
                let html = `
                    <div class="col-2 selected-item${id} pr-0 mt-2 ml-2">
                        <div class="card weak-against-card">
                            <img src="${itemIcon}" class="card-img-top mt-2" alt="${itemName}" style="max-width: 64px; max-height: 64px;">
                            <div class="card-body">
                                <p class="card-title ellipsis-2">${itemName}</p>
                                <button type="button" data-id="${id}"  data-item-id="${itemId}" data-index="${index}"  class="btn btn-danger remove-item p-1">Remove</button>
                            </div>
                        </div>
                    </div>`;
                let hiddenInput = `<input type="hidden" name="item${id}_ids[]" value="${itemId}">`;
                $('#selected-item'+id).append(hiddenInput);
                $('#item'+id+'_results').html("");
                target.append(html);
            });

            // Remove Item
            $(document).on('click', '.remove-item', function() {
                const id = $(this).data('id');
                const itemId = $(this).data('item-id');
                const index = $(this).data('index');

                for (let i=0; i<builds[id-1].length; i++){
                    if(builds[id-1] == itemId){
                        builds[id-1].splice(i, 1);
                    }
                }

                
                // console.log(builds);
                // $(`input[name="item${id}_ids[]"][value="${itemId}"]`).remove();
                
                $(this).closest('.selected-item'+id).remove();
            });

            $('#btn-save-data').on('click', function() {
                let heroId = $(this).data('hero-id');
                storeOrUpdateBuild(heroId);
               
            });

            function storeOrUpdateBuild(heroId){
                let url = isUpdate ? "/admin/mlbb/heroes/" + heroId + "/build-update" : "/admin/mlbb/heroes/" + heroId + "/build";
                console.log(builds);
                $.ajax({
                    url: url,
                    type: "POST",   
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "builds": JSON.stringify(builds)
                        
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = "{{url('/admin/mlbb/heroes')}}";
                    }
                });
            }

            
        });
        
       
    </script>
    
@endsection