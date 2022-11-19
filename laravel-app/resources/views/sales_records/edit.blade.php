@extends('layouts.default')

@section('content')
    <div class="col-12">
        <a href="{{ url()->previous() }}">Back</a>
    </div>
    <h3 class="text-center form_heading">Edit Sales Record</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <x-forms.sales_record :record="$record" />
                </div>
            </div>
        </div>
    </div>
@endsection