{!! Form::open([
    'route' => 'users.store',
    'id' => 'user-form',
    'novalidate',
]) !!}
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="form_group">
                <x-input name="name" label="Full name" type="text" minlength="3" maxlength="25" />
            </div>

            <div class="form_group">
                <x-input name="email" label="Email" type="email" />
            </div>

            <div class="form_group">
                <x-input name="password" label="Password" type="text" minlength="6" />
            </div>

            <div class="form_group">
                <label>
                    {!! Form::checkbox('is_admin', true) !!}

                    <span class="ms-2">
                        Set as admin
                    </span>
                </label>
            </div>
            
            <div class="form_group">
                <button class="btn button" type="submit" id="submit-button">Submit</button>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@section('bottom-scripts')
<script>
$(function() {
    let $btnSubmit = $('#submit-button')
    $("#user-form").validate({
        submitHandler: function(form) {
            $btnSubmit.attr('disabled', true)
            form.submit();
        },
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 25,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 50,
            },
        }
    });

})
</script>
    
@endsection