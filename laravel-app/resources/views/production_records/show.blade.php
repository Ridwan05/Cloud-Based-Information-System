@extends('layouts.default')

@section('content')
    <div class="col-12">
        <a href="{{ url()->previous() }}">Back</a>
    </div>
    <div class="col-md-8 mx-auto">
        <h3 class="text-center form_heading">Production Record</h3>

        <div class="card">
            <table class="table table-bordered table-stripped m-0 p-0">
                <tbody>
                    <tr>
                        <th style="width: 35%">Date</th>
                        <td>{{ $record->date_recorded->format('jS F, Y') }}</td>
                    </tr>
                    <tr>
                        <th>Numbers of Birds on Farm</th>
                        <td>{{ number_format($record->number_of_birds) }}</td>
                    </tr>
                    <tr>
                        <th>Feeds (in bags)</th>
                        <td>{{ number_format($record->feed_consumed_bags) }}</td>
                    </tr>
                    <tr>
                        <th>Feed Price per bag (&#8358;)</th>
                        <td>{{ number_format($record->feed_price_per_bag) }}</td>
                    </tr>
                    <tr>
                        <th>Cost of Feeds (&#8358;)</th>
                        <td>{{ number_format($record->total_feed_cost) }}</td>
                    </tr>
                    <tr>
                        <th>Payable to Suppliers (&#8358;)</th>
                        <td>{{ number_format($record->payable_to_supplier) }}</td>
                    </tr>
                    <tr>
                        <th>Other Expense (&#8358;)</th>
                        <td>{{ number_format($record->other_expenses) }}</td>
                    </tr>
                    <tr>
                        <th>Total Expense (&#8358;)</th>
                        <td>{{ number_format($record->total_expenses) }}</td>
                    </tr>
                    <tr>
                        <th>Numbers of Eggs Produced</th>
                        <td>{{ number_format($record->units_of_eggs_produced) }}</td>
                    </tr>
                    <tr>
                        <th>Numbers of Crates</th>
                        <td>{{ number_format($record->crates_of_eggs_produced) }}</td>
                    </tr>
                    <tr>
                        <th>Numbers of Cracks</th>
                        <td>{{ number_format($record->number_of_cracked_eggs) }}</td>
                    </tr>
                    <tr>
                        <th>Mortality</th>
                        <td>{{ number_format($record->bird_mortalities) }}</td>
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