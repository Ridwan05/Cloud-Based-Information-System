@props([
    'name',
    'id' => '',
    'value' => null,
])

@php
    $inputAttributes = [
        'id' => $id,
        'class' => "form-control",
        ...$attributes,
    ];
@endphp

{!! Form::hidden($name, $value, $inputAttributes) !!}
