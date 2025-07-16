@props([
    'name',
    'value',
    'checked' => false,
])

@php
    $groupAttributes = $attributes->prefixed('group');
    $inputAttributes = $attributes->notPrefixed(['label', 'group']);
@endphp

<label {{ $groupAttributes->class("card card-radio") }}>
    <input
        {{ $inputAttributes->except(['type']) }}
        type="radio"
        name="{{ $name }}"
        value="{{ $value }}"
        @if($checked) checked @endif />
    <span class="custom-radio"></span>
    <div class="card-body">
        {{ $slot }}
    </div>
</label>
