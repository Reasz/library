@props(['name'])

<div class="col-md-16">
    <div class="form-group">
        <label for="{{ $name }}">{{ ucwords($name) }}</label>
        <textarea name="{{ $name }}" class="form-control"
        id="{{ $name }}" rows="4" 
        placeholder="{{ $name }}" > {{ $slot ?? old($name) }} </textarea>

        <x-form.error name="{{ $name }}" />
    </div>
</div>