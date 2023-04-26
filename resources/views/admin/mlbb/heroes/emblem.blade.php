@extends('layouts.admin-mlbb')

@section('content')
<div class="container-fluid pb-3 ">
    <div class="row mt-3 align-middle h-25 align-middle">
        <h1 class="mt-4 ">Emblems for {{$hero->name}}</h1>
        <img class="ml-3" src="{{$hero->icon}}" width="100" height="100"/>
        <div id="btn-save-data"  class=" w-25 h-25 btn btn-primary mt-4 ml-5" data-hero-id="{{$hero->id}}">Save Data</div>
    </div>

    <div class="row ">
        
        @for ($i = 1; $i <= 3; $i++)

        <div class="col-md-4 emblem-wrapper" >

            <div class="form-group">
                <div class="mb-3 mt-3 pl-3">
                    <div class="row ">
                        <label >Filter by Role:</label>
                        <select name="emblem{{$i}}_id" id="emblem_id" class="form-select p-2 ml-2 select_emblem{{$i}}_id emblem_id" data-id="{{$i}}">
                            <option value="">Select Emblem</option>
                            @foreach($emblemTypes as $emblemType)
                                <option value="{{ $emblemType->id }}" >{{ $emblemType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
            </div>
            <div class="row emblem-search-results" id="emblem{{$i}}-first-row"></div>
            <div class="row emblem-search-results" id="emblem{{$i}}-second-row"></div>
            <div class="row emblem-search-results" id="emblem{{$i}}-third-row"></div>
            <div  id="selected-emblem{{$i}}" class="row mt-2">
             
            </div>
            
            
            {{-- <div data-id="{{$i}}"   class="w-50 mt-2 btn btn-primary btn-preview-emblem">Preview Emblem</div> --}}
        </div>
       
        @endfor

    </div>

    
    

</div>



@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let firstRowHtml = "";
            let secondRowHtml = "";
            let thirdRowHtml = "";
            var emblems = [];
            let emblemArray = [3];
            let emblem_type_ids = [3];
            var isUpdateEmblem = false;
            $('.emblem_id').change(function(){
                emblem_type_id = $(this).val();
                let id = $(this).data('id');
                emblem_type_ids[id-1] = emblem_type_id;
                emblems[id-1] = new Object();
                $.ajax({
                    url: '{{ route('api.get-emblems') }}',
                    data: {
                        type_id: emblem_type_id,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        let html = '<div class="row mt-2 ">';
                        let i = 0
                        $('#emblem'+id+'-first-row').html("");
                        $('#emblem'+id+'-second-row').html("");
                        $('#emblem'+id+'-third-row').html("");
                        $.each(response, function(index, emblem) {
                            
                            html = `
                                
                                    <div class="w-25 card mt-2 ml-2 emblem${id}-container emblem${id}-${emblem.id}">
                                        <img src="${emblem.icon}" class="card-img-top mt-2" alt="${emblem.name}" style="width: 64px; height: 64px;">
                                        <div class="card-body">
                                            <p class="card-title ellipsis-2">${emblem.name}</p>
                                            <button id="select-emblem" type="button" class="btn btn-primary select-emblem p-1" data-id="${id}" data-index="${i}" data-emblem-id="${emblem.id}" data-emblem-name="${emblem.name}" data-emblem-icon="${emblem.icon}">Select</button>
                                        </div>
                                    </div>
                                `;
                            
                            if(i < 3){
                                $('#emblem'+id+'-first-row').append(html);
                            }
                            else if(i < 6){
                                $('#emblem'+id+'-second-row').append(html);
                            }
                            else{
                                $('#emblem'+id+'-third-row').append(html);
                            }
                            i++;

                        });

                        
                    }
                });
            });


            $('#btn-save-data').on('click', function() {
                
                if(emblems.length <=0){
                    alert("Please add emblem");
                    return;
                }
                let heroId = $(this).data('hero-id');
                storeOrUpdateEmblem(heroId);
               
            });

            function storeOrUpdateEmblem(heroId){
                let url = isUpdateEmblem ? "/admin/mlbb/heroes/" + heroId + "/emblem-update" : "/admin/mlbb/heroes/" + heroId + "/emblem";
  
                $.ajax({
                    url: url,
                    type: "POST",   
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "emblems": emblems,
                        "emblem_type_ids" : emblem_type_ids,
                        "hero_emblem" : allHeroEmblems
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = "{{url('/admin/mlbb/heroes')}}";
                    }
                });
            }

            
            /// Rendering data on load
            const allHeroEmblems = @json($heroEmblems);
            const allEmblems = @json($emblems);
            const emblemTypes = @json($emblemTypes);
            if(allHeroEmblems.length > 0){
                isUpdateEmblem = true;
            }
            for (let k = 0; k < allHeroEmblems.length; k++) {
                const heroEmblem = allHeroEmblems[k];
                emblemArray = JSON.parse(heroEmblem.emblems);
                emblem_type_ids[k] = heroEmblem.emblem_type_id;
                emblems[k] = emblemArray;
                let id = k+1;

                console.log(emblem_type_ids[k]);
                $('.select_emblem'+id+'_id').val(emblem_type_ids[k]);
                
                $.ajax({
                    url: '{{ route('api.get-emblems') }}',
                    data: {
                        type_id: heroEmblem.emblem_type_id,
                    },
                    dataType: 'json',
                    success: function(response) {
                        
                        // let html = '<div class="row mt-2 ">';
                        let i = 0
                        $('#emblem'+id+'-first-row').html("");
                        $('#emblem'+id+'-second-row').html("");
                        $('#emblem'+id+'-third-row').html("");
                        $.each(response, function(index, emblem) {
                            
                            let html = '<div class="row mt-2 ">';
                            // let emblem = allEmblems[i];
                            html = `
                                
                                    <div class="w-25 card mt-2 ml-2 emblem${id}-container emblem${id}-${emblem.id}">
                                        <img src="${emblem.icon}" class="card-img-top mt-2" alt="${emblem.name}" style="width: 64px; height: 64px;">
                                        <div class="card-body">
                                            <p class="card-title ellipsis-2">${emblem.name}</p>
                                            <button id="select-emblem" type="button" class="btn btn-primary select-emblem p-1" data-id="${id}" data-index="${i}" data-emblem-id="${emblem.id}" data-emblem-name="${emblem.name}" data-emblem-icon="${emblem.icon}">Select</button>
                                        </div>
                                    </div>`;


                            if(i < 3){
                                $('#emblem'+id+'-first-row').append(html);
                                // $('#emblem'+id+'-first-row .emblem'+id+'-container').removeClass("strong-against-card");
                                for (let j = 0; j < emblemArray.length; j++) {
                                    if(emblem.id == emblems[k][j].id){
                                        $('#emblem'+id+'-first-row .emblem'+id+'-'+emblem.id).addClass("strong-against-card");
                                    }
                                }
                                
                            }
                            else if(i < 6){
                                $('#emblem'+id+'-second-row').append(html);
                                
                                for (let j = 0; j < emblemArray.length; j++) {
                                    if(emblem.id == emblems[k][j].id){
                                        $('#emblem'+id+'-second-row .emblem'+id+'-'+emblem.id).addClass("strong-against-card");
                                    }
                                    
                                };
                            }
                            else{
                                $('#emblem'+id+'-third-row').append(html);
                                for (let j = 0; j < emblemArray.length; j++) {
                                    if(emblem.id == emblems[k][j].id){
                                        $('#emblem'+id+'-third-row .emblem'+id+'-'+emblem.id).addClass("strong-against-card");
                                    }
                                    
                                };
                            }

                            i++;

                        });

                        
                    }
                });



            }



            $('.emblem-search-results').on('click', '.select-emblem', function() {        
                let emblemId = $(this).data('emblem-id');
                let emblemName = $(this).data('emblem-name');
                let emblemIcon = $(this).data('emblem-icon');
                let index = $(this).data('index');
                let id = $(this).data('id');
                
                let emblem = new Object();
                emblem.name = emblemName;
                emblem.icon = emblemIcon;
                emblem.id = emblemId;
                
                if(index <3){
                    $('#emblem'+id+'-first-row .emblem'+id+'-container').removeClass("strong-against-card");
                    $('#emblem'+id+'-first-row .emblem'+id+'-'+emblemId).addClass("strong-against-card");

                    firstRowHtml = `
                    <div class="col-3 pr-0 emblem-search-results mt-2 ml-2 ">
                        <div class="card emblem-container emblem-${emblemId}">
                            <img src="${emblemIcon}" class="card-img-top mt-2" alt="${emblemName}" style="width: 64px; height: 64px;">
                            <div class="card-body">
                                <p class="card-title ellipsis-2">${emblemName}</p>
                                
                            </div>
                        </div>
                    
                    </div>`;

                    // emblemArray[0] = emblem;
                    console.log(id-1);
                    
                    emblems[id-1][0] = emblem;
                    

                    
                }
                else if (index <6){
                    $('#emblem'+id+'-second-row .emblem'+id+'-container').removeClass("strong-against-card");
                    $('#emblem'+id+'-second-row .emblem'+id+'-'+emblemId).addClass("strong-against-card");
                    secondRowHtml = `
                    <div class="col-3 pr-0 emblem-search-results mt-2 ml-2 ">
                        <div class="card emblem-container emblem-${emblemId}">
                            <img src="${emblemIcon}" class="card-img-top mt-2" alt="${emblemName}" style="width: 64px; height: 64px;">
                            <div class="card-body">
                                <p class="card-title ellipsis-2">${emblemName}</p>
                                
                            </div>
                        </div>
                    
                    </div>`;

                    // emblemArray[1] = emblem;
                    emblems[id-1][1] = emblem;

                }
                else{
                    $('#emblem'+id+'-third-row .emblem'+id+'-container').removeClass("strong-against-card");
                    $('#emblem'+id+'-third-row .emblem'+id+'-'+emblemId).addClass("strong-against-card");
                    thirdRowHtml = `
                    <div class="col-3 pr-0 emblem-search-results mt-2 ml-2 ">
                        <div class="card emblem-container emblem-${emblemId}">
                            <img src="${emblemIcon}" class="card-img-top mt-2" alt="${emblemName}" style="width: 64px; height: 64px;">
                            <div class="card-body">
                                <p class="card-title ellipsis-2">${emblemName}</p>
                                
                            </div>
                        </div>
                    
                    </div>`;

                    // emblemArray[2] = emblem;
                    emblems[id-1][2] = emblem;
                    
                }

                // emblems[id-1] = emblemArray;
                
            });
            
            
        });
        
       
    </script>
    
@endsection