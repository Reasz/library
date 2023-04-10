@props(['name', 'type' => 'text'])

<div class="col-md-6">
    <div class="form-group">
        <label for="{{ $name }}">{{ ucwords($name) }}</label>
        <input type="{{ $type }}"
                class="form-control"
                id="{{ $name }}"
                name="{{ $name }}" 
                placeholder="{{ $name }}"
                {{ $attributes([ 'value' => old($name)]) }}>

        <x-form.error name="{{ $name }}" />
    </div>
</div>