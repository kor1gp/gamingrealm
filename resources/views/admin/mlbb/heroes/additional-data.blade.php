@extends('layouts.admin-mlbb')

@section('content')
<div class="container-fluid pb-3">
    <h1 class="mt-4 text-center">Additional Data for {{$hero->name}}</h1>
    <form method="POST" action="{{ route('admin.mlbb.heroes.additional-data.store',$hero->id) }}">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Weak Against -->
            <div class="form-group ">
                <label for="weak_against">Weak Against</label>
                <input type="text" class="form-control search-hero" placeholder="Search weak against heroes..." data-target="#weak_against_results">


                <div class="hero-search-results" id="weak_against_results"></div>
                <div class="row hero-search-results" id="selected_weak_against"></div>
            </div>

            <div id="selected-weak-heroes">
            </div>

            <!-- Strong Against -->
            <div class="form-group">
                <label for="strong_against">Strong Against</label>
                <input type="text" class="form-control search-hero " placeholder="Search strong against heroes..." data-target="#strong_against_results">
                <div class="hero-search-results " id="strong_against_results"></div>
                <div class="row hero-search-results" id="selected_strong_against"></div>
            </div>
            
            <div id="selected-strong-heroes">
            </div>


            <!-- Item Counter -->
            <div class="form-group">
                <label for="strong_against">Item Counter</label>
                <input type="text" class="form-control search-item" placeholder="Search item to counter heroes..." data-target="#item_counter_results">
                <div class="item-search-results" id="item_counter_results"></div>
                <div class="row item-search-results" id="selected_item_counter"></div>
            </div>

            <div id="selected-item-counter">
            </div>


            <button type="submit" class="btn btn-primary">Save Data</button>
            
        </div>
    
        {{-- <div class="col-md-6">
            <div class="form-group">
                <label for="strong_against">Emblems</label>
                <div class="mb-3 mt-3 pl-3">
                    
                    
                    <div class="row ">
                        <label >Filter by Role:</label>
                        <select name="emblem_id" id="emblem_id" class="form-select p-2 ml-2">
                            <option value="">Select Emblem</option>
                            @foreach($emblemTypes as $emblemType)
                                <option value="{{ $emblemType->id }}" >{{ $emblemType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
            </div>
            <div id="get-emblem-results">
            </div>
            <div id="selected-emblem">
               
            </div>
        </div> --}}
    </div>
    
    </form>

</div>



@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        

        $(document).ready(function() {


            const allHeroes = @json($heroes);
            const allItems = @json($items);
            
            let selectedWeaknesses = @json($weaknesses->pluck('id')->toArray());
            let selectedStrenghts = @json($strengths->pluck('id')->toArray());
            let selectedItemCounter = @json($itemCounters->pluck('id')->toArray());
            
            function renderSelectedWeaknesses() {
                selectedWeaknesses.forEach((weaknessId) => {
                    const hero = allHeroes.find((hero) => hero.id === weaknessId);
                    if (hero) {
                        createHeroElement(hero, true);
                    }
                });
            }

            function renderSelectedStrengths() {
                selectedStrenghts.forEach((strenghId) => {
                    const hero = allHeroes.find((hero) => hero.id === strenghId);
                    if (hero) {
                        createHeroElement(hero, false);
                    }
                });
            }

            function renderItemCounters() {
                selectedItemCounter.forEach((itemCounterId) => {
                    const item = allItems.find((item) => item.id === itemCounterId);
                    if (item) {
                        createItemElement(item);
                    }
                });
            }

            

            function createHeroElement(hero, isWeakAgainst) {
                let target = $(this).closest('.hero-search-results').next();
                let cardClass = isWeakAgainst ? 'weak-against-card' : 'strong-against-card';
                let hiddenInput = "";
                let selectedId = "";
                if(isWeakAgainst){
                    selectedId = "selected_weak_against";
                    hiddenInput =  `<input type="hidden" name="weak_hero_ids[]" value="${hero.id}">`;
                    $('#selected-weak-heroes').append(hiddenInput);
                    
                }
                else{
                    selectedId = "selected_strong_against";
                    hiddenInput =  `<input type="hidden" name="strong_hero_ids[]" value="${hero.id}">`;
                    $('#selected-strong-heroes').append(hiddenInput);
                    
                }
                let html = `
                <div class="col-2 selected-hero pr-0 mt-2">
                    <div class="card  ${cardClass}">
                        <img src="${hero.icon}" class="card-img-top mt-2" alt="${hero.name}" style="max-width: 64px; max-height: 64px;">
                        <div class="card-body">
                            <p class="card-title ellipsis-2">${hero.name}</p>
                            
                            <button type="button" data-hero-id="${hero.id}" class="btn btn-danger remove-hero p-1">Remove</button>
                        </div>
                    </div>
                </div>`;
            
                $('#'+selectedId).append(html);
                
            }

            function createItemElement(item) {
                let target = $(this).closest('.item-search-results').next();
                
                
                let hiddenInput =  `<input type="hidden" name="item_counter_ids[]" value="${item.id}">`;
                $('#selected-item-counter').append(hiddenInput);
                let html = `
                <div class="col-2 selected-item pr-0 mt-2">
                    <div class="card  weak-against-card">
                        <img src="${item.icon}" class="card-img-top mt-2" alt="${item.name}" style="max-width: 64px; max-height: 64px;">
                        <div class="card-body">
                            <p class="card-title ellipsis-2">${item.name}</p>
                            <button type="button" data-item-id="${item.id}" class="btn  btn-danger remove-item p-1">Remove</button>
                        </div>
                    </div>
                </div>`;
            
                $('#selected_item_counter').append(html);
                
            }

            
            // Call the function to render the selected weaknesses when the page loads
            renderSelectedWeaknesses();
            renderSelectedStrengths();
            renderItemCounters() ;
            

            $('.search-hero').on('input', function() {
                let query = $(this).val();
                let target = $($(this).data('target'));

                if (query.length < 2) {
                    target.html('');
                    return;
                }

                $.ajax({
                    url: '{{ route('api.search-heroes', $hero->name) }}',
                    data: {
                        q: query,
                        selected_weak_against: getSelectedHeroIds('#selected-weak-against'),
                        selected_strong_against: getSelectedHeroIds('#selected-strong-against'),
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        let html = '<div class="row mt-2 ">';
                        $.each(response, function(index, hero) {
                            html += `
                                
                                <div class="col-2 pr-0">
                                    <div class="card">
                                        <img src="${hero.icon}" class="card-img-top mt-2" alt="${hero.name}" style="max-width: 64px; max-height: 64px;">
                                        <div class="card-body">
                                            <p class="card-title ellipsis-2">${hero.name}</p>
                                            <button type="button" class="btn btn-primary select-hero p-1" data-hero-id="${hero.id}" data-hero-name="${hero.name}" data-hero-icon="${hero.icon}">Select</button>
                                        </div>
                                    </div>
                                
                                </div>`;

                        });

                        target.html(html);
                    }
                });
            });

            

            
        });


        $('.hero-search-results').on('click', '.select-hero', function() {
            let heroId = $(this).data('hero-id');
            let heroName = $(this).data('hero-name');
            let heroIcon = $(this).data('hero-icon');
            let target = $(this).closest('.hero-search-results').next();
            let isWeakAgainst = target.attr('id') === 'selected_weak_against';
            let cardClass = isWeakAgainst ? 'weak-against-card' : 'strong-against-card';
            
             

            // Check if the hero is already selected by name
            let existingHero = target.find('.card-title:contains("' + heroName + '")');
            if (existingHero.length > 0) {
                alert('This hero is already selected.');
                return;
            }

            let html = `
                <div class="col-2 selected-hero pr-0 mt-2">
                    <div class="card  ${cardClass}">
                        <img src="${heroIcon}" class="card-img-top mt-2" alt="${heroName}" style="max-width: 64px; max-height: 64px;">
                        <div class="card-body">
                            <p class="card-title ellipsis-2">${heroName}</p>
                            <button type="button" data-hero-id="${heroId}" class="btn btn-danger remove-hero p-1">Remove</button>
                        </div>
                    </div>
                </div>`;

            let hiddenInput = "";
            if(isWeakAgainst){
                hiddenInput = `<input type="hidden" name="weak_hero_ids[]" value="${heroId}">`;
                $('#selected-weak-heroes').append(hiddenInput);
                $('#weak_against_results').html("");
                
            }
            else{
                hiddenInput = `<input type="hidden" name="strong_hero_ids[]" value="${heroId}">`;
                $('#selected-strong-heroes').append(hiddenInput);
                $('#strong_against_results').html("");
            }
            
            target.append(html);
        });

        function getSelectedHeroIds(container) {
            let heroIds = [];
            $(container).find('input[type="hidden"]').each(function () {
                heroIds.push($(this).val());
            });
            return heroIds;
        }


        // Remove hero
        $(document).on('click', '.remove-hero', function() {
            const heroId = $(this).data('hero-id');
            $(`input[name="weak_hero_ids[]"][value="${heroId}"]`).remove();
            $(`input[name="strong_hero_ids[]"][value="${heroId}"]`).remove();
            $(this).closest('.selected-hero').remove();
            
            
        });

        // Remove Item
        $(document).on('click', '.remove-item', function() {
            
            const itemId = $(this).data('item-id');
            $(`input[name="item_counter_ids[]"][value="${itemId}"]`).remove();
            $(this).closest('.selected-item').remove();
        });

        // Remove Emblem
        $(document).on('click', '.remove-emblem', function() {
            
            const id = $(this).data('emblem-id');
            $(`input[name="emblem_ids[]"][value="${id}"]`).remove();
            $(this).closest('.selected-emblem').remove();
        });



        $('.search-item').on('input', function() {
                let query = $(this).val();
                let target = $($(this).data('target'));

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
                        $.each(response, function(index, item) {
                            html += `
                                
                                <div class="col-2 pr-0 selected-item ">
                                    <div class="card ">
                                        <img src="${item.icon}" class="card-img-top mt-2" alt="${item.name}" style="max-width: 64px; max-height: 64px;">
                                        <div class="card-body">
                                            <p class="card-title ellipsis-2">${item.name}</p>
                                            <button type="button" class="btn btn-primary select-item p-1" data-item-id="${item.id}" data-item-name="${item.name}" data-item-icon="${item.icon}">Select</button>
                                        </div>
                                    </div>
                                
                                </div>`;

                        });

                        target.html(html);
                    }
                });
            });

        $('.item-search-results').on('click', '.select-item', function() {
        
            let itemId = $(this).data('item-id');
            let itemName = $(this).data('item-name');
            let itemIcon = $(this).data('item-icon');
            let target = $(this).closest('.item-search-results').next();
            

            // Check if the hero is already selected by name
            let existingItem = target.find('.card-title:contains("' + itemName + '")');
            if (existingItem.length > 0) {
                alert('This item is already selected.');
                return;
            }

            
            let html = `
                <div class="col-2 selected-item pr-0 mt-2 ml-2">
                    <div class="card weak-against-card">
                        <img src="${itemIcon}" class="card-img-top mt-2" alt="${itemName}" style="max-width: 64px; max-height: 64px;">
                        <div class="card-body">
                            <p class="card-title ellipsis-2">${itemName}</p>
                            <button type="button"  data-item-id="${itemId}"  class="btn btn-danger remove-item p-1">Remove</button>
                        </div>
                    </div>
                </div>`;
            let hiddenInput = `<input type="hidden" name="item_counter_ids[]" value="${itemId}">`;
            $('#selected-item-counter').append(hiddenInput);
            $('#item_counter_results').html("");
            target.append(html);
        });

        // $('#emblem_id').change(function(){
        //     let emblem_type_id = $(this).val();
            

            
        //     $.ajax({
        //         url: '{{ route('api.get-emblems') }}',
        //         data: {
        //             type_id: emblem_type_id,
        //         },
        //         dataType: 'json',
        //         success: function(response) {
        //             console.log(response);
        //             let html = '<div class="row mt-2 ">';
        //             $.each(response, function(index, emblem) {
        //                 html += `
                            
        //                     <div class="col-2 pr-0 emblem-search-results mt-2 ml-2">
        //                         <div class="card ">
        //                             <img src="${emblem.icon}" class="card-img-top mt-2" alt="${emblem.name}" style="max-width: 64px; max-height: 64px;">
        //                             <div class="card-body">
        //                                 <p class="card-title ellipsis-2">${emblem.name}</p>
        //                                 <button type="button" class="btn btn-primary select-emblem p-1" data-emblem-id="${emblem.id}" data-emblem-name="${emblem.name}" data-emblem-icon="${emblem.icon}">Select</button>
        //                             </div>
        //                         </div>
                            
        //                     </div>`;

        //             });
        //             $('#get-emblem-results').append(html);

        //         }
        //     });
        // });
        
        
       
    </script>
    
@endsection