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
])

<div class="form_group">
    @if (!empty($label))
        {!! Form::label($name, $label, ['class' => 'form_group-lebel']); !!}
    @endif
    {!!
        Form::$type($name, null, [
            'id' => $id,
            'class' => 'form-control '
                . ($errors->first($name) ? ' is-invalid' : ''),
            'placeholder' => $label,
            'required' => boolval($required),
            'min' => intval($min) ?: false,
            'step' => floatval($step) ?: false,
            'rows' => intval($rows) ?: false,
            'cols' => intval($cols) ?: false,
        ])
    !!}

    @error($name)
        <div class="invalid-feedback">{{ $message  }}</div>
    @enderror
</div>