@props([
    'record' => '',
    'dateFrom' => '',
    'dateTo' => '',
])

{!! Form::open([
    'id' => 'filter-form',
    'method' => 'GET',
]) !!}

@php
    $options = [
        "sales" => 'Sales',
        'production' => 'Production',
    ];

@endphp
<div class="form_group">
    <x-select
        name="record"
        label="Records"
        :options="$options"
        :value="$record"
        required
    />
</div>
    
<div class="d-flex align-items-center">
    <x-input name="date_from" label="From" type="date" container-class="px-4" :value="$dateFrom" />
    <x-input name="date_to" label="To" type="date" container-class="px-4" :value="$dateTo" />    
</div>

<div>
      <button type="submit" class="btn btn-primary button">Show Records</button>   
</div>
{!! Form::close() !!}