@extends('layouts.default')

@section('content')
    <h3 class="text-center form_heading">Add Sales Record</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <x-forms.sales_record />
                </div>
            </div>
        </div>
    </div>
@endsection