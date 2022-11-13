@if (session('status_success'))
    <div class="alert alert-success my-4">
        {{ session('status_success') }}
    </div>
@endif

@if (session('status_error'))
    <div class="alert alert-danger my-4">
        {{ session('status_error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-warning my-4">
        Please, correct all indicated fields and try again.
    </div>
@endif