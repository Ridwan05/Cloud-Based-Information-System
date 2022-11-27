@props([
    'name',
    'label' => null,
    'required' => false,
    'id' => '',
    'type' => 'text',
    'min' => '',
    'step' => '',
    'cols' => '',
    'rows' => '',
    'class' => '',
    'containerClass' => '',
    'value' => null,
])

@php
    $inputAttributes = [
        'id' => $id,
        'class' => "form-control {$class} "
            . ($errors->first($name) ? ' is-invalid' : ''),
        'placeholder' => $label,
        'required' => boolval($required),
        'min' => intval($min) ?: false,
        'step' => floatval($step) ?: false,
        'rows' => intval($rows) ?: false,
        'cols' => intval($cols) ?: false,
        ...$attributes,
    ];
@endphp

<div class="form_group {{ $containerClass }}">
    @if (!empty($label))
        {!! Form::label($name, $label, ['class' => 'form_group-lebel']); !!}
    @endif
    {!! Form::$type($name, $value, $inputAttributes) !!}

    <x-field-error :name="$name" />
</div>