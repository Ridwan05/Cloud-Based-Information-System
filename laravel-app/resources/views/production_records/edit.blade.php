@extends('layouts.default')

@section('content')
    <h3 class="text-center form_heading">Edit Production Record</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <x-forms.production_record :record="$record" />
                </div>
            </div>
        </div>
    </div>
@endsection