@props([
    'record'
])

@if (empty($record->id))
    {!! Form::open([
        'route' => 'sales_records.store',
        'id' => 'sales-form',
        'novalidate',
    ]) !!}

@else
    {!!
        Form::model($record, [
            'route' => ['sales_records.update', $record->id],
            'id' => 'sales-form',
            'novalidate',
        ])
    !!}
@endif

    <div class="form_group">
        <x-input name="date_recorded" label="Date" type="date" :value="!empty($record->id) ? $record->date_recorded->format('Y-m-d') : null" required />
    </div>

    <div class="form_group">
        <x-input name="available_stock" label="Available Stock" type="number" min="0" required />
    </div>

    <div class="form_group">
        <x-input
            name="price_per_crate"
            id="price_per_crate"
            label="Price per crate (in naira)"
            type="number"
            min="1"
            step="0.01"
            required
        />
    </div>

    <div class="form_group">
        <x-input
            name="crates_sold"
            id="crates_sold"
            label="Sales (in naira)"
            type="number"
            min="1"
            required
        />
    </div>

    <div class="form_group">
        <x-input
            name="total_revenue"
            id="disabled_total_revenue"
            label="Total Revenue (in naira)"
            type="number"
            min="1"
            step="0.01"
            required
        />
        <x-input-hidden
            name="total_revenue"
            id="total_revenue"
        />
    </div>

    <div class="form_group">
        <x-input name="outstanding_balance" label="Outstanding Balance (Naira)" type="number" min="1" step="0.01" required />
    </div>

    <div class="form_group">
        <x-input name="balance_payment" label="Balance Payment (Naira)" type="number" min="1" step="0.01" required />
    </div>

    <div class="form_group">
        <x-input name="cash_transfer_to_production" label="Cash Transfer To Production (Naira)" type="number" min="1" step="0.01" required />
    </div>

    <div class="form_group">
        <x-input name="bank_deposit" label="Bank Deposit (Naira)" type="number" min="1" step="0.01" required />
    </div>

    <div class="form_group">
        <x-input name="comments" label="Comments" type="textarea" cols="10" rows="3" />
    </div>


    <div class="form_group">
        <button class="btn button" type="submit" id="submit-button">Submit</button>
    </div>
{!! Form::close() !!}

@section('bottom-scripts')
<script>
$(function() {
    let $btnSubmit = $('#submit-button')
    let quantityValidationRules = {
        required: true,
        min: 1,
        max: 999999,
    }

    let $inputPricePerCrate = $('#price_per_crate')
    let $inputCratesSold = $('#crates_sold')
    let $disabledInputTotalRevenue = $('#disabled_total_revenue')
    let $inputTotalRevenue = $('#total_revenue')

    $("#sales-form").validate({
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
            date_recorded: {
                required: true,
            },
            available_stock: {
                ...quantityValidationRules,
                min: 0,
            },
            price_per_crate: {...quantityValidationRules},
            crates_sold: {...quantityValidationRules},
            outstanding_balance: {...quantityValidationRules},
            balance_payment: {...quantityValidationRules},
            cash_transfer_to_production: {
                ...quantityValidationRules,
                min: 0,
            },
            bank_deposit: {
                ...quantityValidationRules,
                min: 0,
            },
            comments: {
                maxlength: 1000,
            }
        }
    });

    function calculateRevenue() {
        const pricePerCrate = Number($inputPricePerCrate.val()) || 0
        const cratesSold = Number($inputCratesSold.val()) || 0
        const revenue = (pricePerCrate * cratesSold).toFixed(2)
        $disabledInputTotalRevenue.val(revenue)
        $inputTotalRevenue.val(revenue)
    }

    $inputPricePerCrate.on('change keyup', () => calculateRevenue())
    $inputCratesSold.on('change keyup', () => calculateRevenue())

})
</script>
    
@endsection

