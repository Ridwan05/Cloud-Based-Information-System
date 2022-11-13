@props([
    'name',
    'label' => null,
    'required' => false,
    'id' => '',
    'type' => 'text',
    'options' => [],
    'class' => '',
    'value' => '',
    'containerClass' => '',
    'placeholder' => 'Select one',
])


<div class="form_group {{ $containerClass }}">
    @if (!empty($label))
        {!! Form::label($name, $label, ['class' => 'form_group-lebel']); !!}
    @endif
    {!!
        Form::select($name, $options, $value, [
            'id' => $id,
            'placeholder' => $placeholder ?: false,
            'required' => boolval($required),
            'class' => "form-control  {$class} "
                . ($errors->first($name) ? ' is-invalid' : ''),
        ]);
    !!}
</div>