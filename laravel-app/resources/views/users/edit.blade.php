@extends('layouts.default')

@section('content')
    <h2 class="text-center">Add User</h2>
    <div class="card">
        <div class="card-body">
            <x-forms.user :user="$user" />
        </div>
    </div>
@endsection