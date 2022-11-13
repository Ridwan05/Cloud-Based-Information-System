@extends('layouts.blank')

@section('content')
{!! Form::open([
    'route' => 'authenticate',
    'id' => 'login-form',
    'novalidate',
    'method' => 'post',
    'class' => 'col-md-5 mx-auto'
]) !!}
    <x-flash />
    <div class="fs-4 text-center mt-4">Login</div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <x-input name="email" label="Email" required />
            </div>
            <div class="my-4">
                <x-input-password name="password" required />
            </div>
        </div>
        <div class="card-footer">
            <button class="button" type="submit" id="submit-button">LOGIN</button>
        </div>
    </div>
{!! Form::close() !!}
@endsection

@section('bottom-scripts')
<script>
$(function() {
    let $btnSubmit = $('#submit-button')
    $("#login-form").validate({
        submitHandler: function(form) {
            $btnSubmit.attr('disabled', true)
            form.submit();
        },
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
        }
    });

})
</script>
    
@endsection