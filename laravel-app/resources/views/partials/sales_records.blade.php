
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
                    {!! Form::open([
                        'class' => 'inline delete-form',
                        'method' => 'DELETE',
                        'url' => route('sales_records.destroy', $record->id),
                        'data-id' => $record->id,
                    ]) !!}
                        <button
                            class="btn btn-sm"
                            type="submit"
                        >
                            Delete
                        </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<script>
window.addEventListener('load', () => {
    let confirmed = null
    $('.delete-form').on('submit', event => {
        if (confirmed) {
            return
        }
        event.preventDefault()
        document.dispatchEvent(new CustomEvent('confirm', {
            detail: {
                action: () => {
                    confirmed = $(event.target).attr('data-id')
                    event.target.submit()
                }
            }
        }))
    })
})
</script>