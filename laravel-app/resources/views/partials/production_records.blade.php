
<table class="table table-hover table-bordered p-0 m-0">
    <thead>
        <tr>
            <th>Date</th>
            <th>Number of birds</th>
            <th>Total Expense(&#8358;)</th>
            <th>Eggs Produced</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            <tr>
                <td>{{ $record->date_recorded->format('d/m/Y') }}</td>
                <td>{{ number_format($record->number_of_birds) }}</td>
                <td>{{ number_format($record->total_expenses) }}</td>
                <td>{{ number_format($record->units_of_eggs_produced) }}</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>