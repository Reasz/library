@props(['name', 'elements'])

<div class="col-md-16">
    <div class="form-group">
        <label for="genres">{{ ucwords($name) }}</label>
        <select multiple class="form-control" id="{{ $name }}" name="{{ $name }}[]" required>
            @php
                $genres = \App\Models\Genre::all();
            @endphp

            @foreach ($elements as $element)
                <option 
                value="{{ $element->id }}" {{ old($name) == $element->id ? 'selected' : '' }}> 
                    {{ ucwords($element->name) }}
                </option>
            @endforeach
            
        </select>

        <x-form.error name="{{ $name }}" />
    </div>
</div>