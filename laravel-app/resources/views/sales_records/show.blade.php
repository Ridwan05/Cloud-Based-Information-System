@extends('layouts.default')

@section('content')
    <div class="col-12">
        <a href="{{ url()->previous() }}">Back</a>
    </div>
    <div class="col-md-8 mx-auto">
        <h3 class="text-center form_heading">Sales Record</h3>

        <div class="card">
            <table class="table table-bordered table-stripped m-0 p-0">
                <tbody>
                    <tr>
                        <th style="width: 35%">Date</th>
                        <td>{{ $record->date_recorded->format('jS F, Y') }}</td>
                    </tr>
                    <tr>
                        <th>Available Stock</th>
                        <td>{{ number_format($record->available_stock) }}</td>
                    </tr>
                    <tr>
                        <th>Price per crate</th>
                        <td>&#8358;{{ number_format($record->price_per_crate) }}</td>
                    </tr>
                    <tr>
                        <th>Crates Sold</th>
                        <td>{{ number_format($record->crates_sold) }}</td>
                    </tr>
                    <tr>
                        <th>Total Revenue</th>
                        <td>&#8358;{{ number_format($record->total_revenue) }}</td>
                    </tr>
                    <tr>
                        <th>Outstanding Balance</th>
                        <td>&#8358;{{ number_format($record->outstanding_balance) }}</td>
                    </tr>
                    <tr>
                        <th>Balance Payment</th>
                        <td>&#8358;{{ number_format($record->balance_payment) }}</td>
                    </tr>
                    <tr>
                        <th>Cash Transfer To Production</th>
                        <td>&#8358;{{ number_format($record->cash_transfer_to_production) }}</td>
                    </tr>
                    <tr>
                        <th>Bank Deposit</th>
                        <td>&#8358;{{ number_format($record->bank_deposit) }}</td>
                    </tr>
                    <tr>
                        <th>Comments</th>
                        <td>{{ $record->comments }}</td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td>
                            {{ $record->creator->name }}
                            <div class="small text-sm">
                                ({{ $record->created_at->format('d/m/Y g:iA')}})
                            </div>
                        </td>
                    </tr>
                    @if (!empty($record->updated_by))
                        <tr>
                            <th>Updated</th>
                            <td>
                                {{ $record->updater->name }}
                                <div class="small text-sm">
                                    ({{ $record->updated_at->format('d/m/Y g:iA')}})
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection