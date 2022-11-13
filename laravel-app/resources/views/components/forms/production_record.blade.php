{!! Form::open([
    'route' => 'production_records.store',
    'id' => 'production-form',
    'novalidate',
]) !!}

    <div class="form_group">
        <x-input name="date_recorded" label="Date" type="date" required />
    </div>

    <div class="form_group">
        <x-input name="number_of_birds" label="Numbers of Birds on Farm" type="number" min="1" required />
    </div>

    <div class="form_group">
        <x-input name="feed_consumed_bags" label="Feeds (in bags)" type="number" min="1" required />
    </div>

    <div class="form_group">
        <x-input name="feed_price_per_bag" label="Feed Price per bag (in naira)" type="number" min="1" step="0.01" required />
    </div>

    <div class="form_group">
        <x-input name="total_feed_cost" label="Cost of Feeds (Naira)" type="number" min="1" step="0.01" required />
    </div>

    <div class="form_group">
        <x-input name="payable_to_supplier" label="Payable to Suppliers (Naira)" type="number" min="0" step="0.01" />
    </div>

    <div class="form_group">
        <x-input name="other_expenses" label="Other Expense (Naira)" type="number" min="0" step="0.01" />
    </div>

    <div class="form_group">
        <x-input name="total_expenses" label="Total Expense (Naira)" type="number" min="1" step="0.01" required />
    </div>

    <div class="form_group">
        <x-input name="units_of_eggs_produced" label="Numbers of Eggs Produced" type="number" min="1" required />
    </div>

    <div class="form_group">
        <x-input name="crates_of_eggs_produced" label="Numbers of Crates" type="number" min="0" />
    </div>

    <div class="form_group">
        <x-input name="number_of_cracked_eggs" label="Numbers of Cracks" type="number" min="0" />
    </div>

    <div class="form_group">
        <x-input name="bird_mortalities" label="Mortality" type="number" min="0" />
    </div>

    <div class="form_group">
        <x-input name="comments" label="Comments" type="textarea" cols="10" rows="3" />
    </div>


    <div class="form_group">
        <button class="button" type="submit" id="submit-button">Submit</button>
    </div>
{!! Form::close() !!}

@section('bottom-scripts')
<script>
$(function() {
    let $btnSubmit = $('#submit-button')
    $("#production-form").validate({
        submitHandler: function(form) {
            // do other things for a valid form
            $btnSubmit.attr('disabled', true)
            form.submit();
        },
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        },
        rules: {
            number_of_birds: {
                required: true,
                // digits: true,
                // min: 1,
                // max: 999999,
            },
            feed_consumed_bags: {
                required: true,
                min: 1,
                max: 999999,
            },
            price_per_bag: {
                required: true,
                min: 1,
                max: 99999999,
            },
            total_feed_cost: {
                required: true,
                min: 1,
                max: 99999999,
            },
            payable_to_supplier: {
                required: false,
                min: 0,
                max: 99999999,
            },
            other_expenses: {
                required: true,
                min: 0,
                max: 99999999,
            },
            total_expenses: {
                required: true,
                min: 1,
                max: 99999999,
            },
            units_of_eggs_produced: {
                required: true,
                min: 1,
                max: 99999999,
            },
            crates_of_eggs_produced: {
                required: true,
                min: 0,
                max: 9999999,
            },
            number_of_cracked_eggs: {
                required: true,
                min: 0,
                max: 99999,
            },
            bird_mortalities: {
                required: true,
                min: 0,
                max: 99999,
            },
            comments: {
                maxlength: 1000,
            }
        }
    });

})
</script>
    
@endsection

