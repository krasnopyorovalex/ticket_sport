<div class="row">
    <div class="col-md-12">
        <legend class="text-uppercase font-size-sm">Цены на категории мест стадиона:</legend>
    </div>
    @foreach($stadiumPlaces as $place)
    <div class="col-md-2">
        <div class="form-group">
            <label for="place_{{ $place->id }}">{{ $place->name }}:</label>
            <input type="text" class="form-control border-xs" style="border-color: {{ $place->color }}" id="place_{{ $place->id }}" name="places[{{ $place->id }}]" value="{{ $matchPlaces[$place->id] ?? '' }}" autocomplete="off">
        </div>
    </div>
    @endforeach
</div>
