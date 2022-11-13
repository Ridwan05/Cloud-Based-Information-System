@props([
    'name' => 'password',
    'label' => 'Password',
    'required' => true,
    'id' => '',
    'minlength' => '6',
])

<div class="form_group">
    @if (!empty($label))
        {!! Form::label($name, $label, ['class' => 'form_group-lebel']); !!}
    @endif
    {!!
        Form::password($name, [
            'id' => $id,
            'class' => 'form-control '
                . ($errors->first($name) ? ' is-invalid' : ''),
            'placeholder' => $label,
            'required' => boolval($required),
            'minlength' => intval($minlength) ?: false,
        ])
    !!}

    @error($name)
        <div class="invalid-feedback">{{ $message  }}</div>
    @enderror
</div>