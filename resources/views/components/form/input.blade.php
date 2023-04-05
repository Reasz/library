@props(['name', 'type' => 'text'])

<div class="col-md-6">
    <div class="form-group">
        <label for="{{ $name }}">{{ ucwords($name) }}</label>
        <input type="{{ $type }}" value="{{ old($name) }}" class="form-control" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $name }}" required>

        <x-form.error name="{{ $name }}" />
    </div>
</div>