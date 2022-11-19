
<table class="table table-hover table-bordered p-0 m-0">
    <thead>
        <tr>
            <th>Date</th>
            <th>Total Revenue(&#8358;)</th>
            <th>Crates Sold</th>
            <th>Price per crate</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            <tr>
                <td>{{ $record->date_recorded->format('d/m/Y') }}</td>
                <td>{{ number_format($record->total_revenue) }}</td>
                <td>{{ number_format($record->crates_sold) }}</td>
                <td>{{ number_format($record->price_per_crate) }}</td>
                <td>
                    <a href="{{ route('sales_records.show', $record->id) }}" class="btn btn-sm">
                        View
                    </a>
                    <a href="{{ route('sales_records.edit', $record->id) }}" class="btn btn-sm">
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>