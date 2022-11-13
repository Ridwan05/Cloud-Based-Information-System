@extends('layouts.default')

@section('content')
    <div class="card">
        @if ($records->total() == 0)
            <div class="card-body p-2">
                <div class="alert alert-warning">
                    No record found!
                </div>
            </div>
        @else
            @include(
                $rqRecord == 'production'
                    ? 'partials.production_records'
                    : 'partials.sales_records'
            )
            @if ($records->lastPage() > 1)
                <div class="card-footer text-end">
                    {!! $records->links() !!}
                </div>
            @endif
        @endif
    </div>
@endsection
