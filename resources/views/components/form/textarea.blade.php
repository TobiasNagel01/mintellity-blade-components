@props([
    'name',
    'id' => null,
    'label' => null,
    'value' => null,
    'required' => false,
    'disabled' => false,
    'inlineLabels' => config('blade-components.forms.inline-labels', false),
    'inlineLabelWidth' => config('blade-components.forms.inline-label-width', '2'),
])

@php
    $labelAttributes = $attributes->prefixed('label');
    $groupAttributes = $attributes->prefixed('group');
    $inputAttributes = $attributes->notPrefixed(['label', 'group']);
@endphp

<div {{ $attributes->class(["mb-3", "invalid-feedback-group", "row" => $inlineLabels]) }}>

    @if($label)
        <label
            {{ $labelAttributes->class(["form-label", "col-md-$inlineLabelWidth col-form-label" => $inlineLabels])->except('for') }}
            for="{{ $id ?? $name }}">
            @if($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </label>
    @endif

    @if($inlineLabels)
        <div class="col-md-{{ 12 - $inlineLabelWidth }}">@endif

            <div class="input-group">
                @isset($prepend)
                    {{ $prepend }}
                @endisset

                <textarea
                    id="{{ $id ?? $name }}"
                    name="{{$name}}"
                    {{ $inputAttributes->class(["form-control", "dynamic-height", "is-invalid" => $errors->has($name)])->except(['id', 'name', 'required'])->merge(['rows' => '3']) }}
                >{{ isset($value) ? $value : '' }}</textarea>

                @isset($append)
                    {{ $append }}
                @endisset
            </div>

            @isset($hint)
                <small class="form-text text-muted">{{ $hint }}</small>
            @endisset

            <div class="invalid-feedback"></div>

            @if($inlineLabels)</div>
    @endif
</div>
