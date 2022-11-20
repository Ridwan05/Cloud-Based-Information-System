
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
                <td>
                    <a href="{{ route('production_records.show', $record->id) }}" class="btn btn-sm">
                        View
                    </a>
                    @if (authUserIsAdmin())
                        <a href="{{ route('production_records.edit', $record->id) }}" class="btn btn-sm">
                            Edit
                        </a>
                        {!! Form::open([
                            'class' => 'inline delete-form',
                            'method' => 'DELETE',
                            'url' => route('production_records.destroy', $record->id),
                            'data-id' => $record->id,
                        ]) !!}
                            <button
                                class="btn btn-sm"
                                type="submit"
                            >
                                Delete
                            </button>
                        {!! Form::close() !!}
                    @endif
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