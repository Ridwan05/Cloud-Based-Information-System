<div class="topnav d-flex">
    <div class="me-auto">
        <a class="active" href="/">Home</a>
        <a href="{{ route('production_records.create') }}">Add Production Records</a>
        <a href="{{ route('sales_records.create') }}">Add Sales Records</a>
        @if (authUserIsAdmin())
            <a href="{{ route('users.index') }}">Users</a>
        @endif
    </div>
    <a href="#" onclick="document.querySelector('#logout-form').submit()">
        logout
    </a>
</div>
{!! Form::open([
    'route' => 'logout',
    'id' => 'logout-form',
    'method' => 'post',
]) !!}

{!! Form::close() !!}