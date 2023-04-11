@props(['name', 'elements', 'values' => collect()])

<div class="col-md-16">
    <div class="form-group">
        <label for="{{ $name }}">{{ ucwords($name) }}</label>
        <select multiple class="form-control" id="{{ $name }}" name="{{ $name }}[]" required>
            @php
                $genres = \App\Models\Genre::all();
            @endphp
            @foreach ($elements as $element) 
                @if (old($name))
                    <option value="{{ $element->id }}" {{ in_array($element->id, old($name)) ? 'selected' : '' }}>{{ $element->name }}</option>   
                @else
                    <option value="{{ $element->id }}" {{ $values->contains($element->id) ? 'selected' : '' }}>{{ $element->name }}</option>
                @endif 
            @endforeach
        </select>
        <x-form.error name="{{ $name }}" />
    </div>
</div>