@props([
    'record'
])


@php
    $isEdit = !empty($record->id);
    $totalFeedCost = $isEdit
        ? $record->total_feed_cost
        : old('total_feed_cost')
@endphp

@if (!$isEdit)
    {!! Form::open([
        'route' => 'production_records.store',
        'id' => 'production-form',
        'novalidate',
    ]) !!}

@else
    {!!
        Form::model($record, [
            'route' => ['production_records.update', $record->id],
            'id' => 'production-form',
            'novalidate',
        ])
    !!}
@endif


    <div class="form_group">
        <x-input name="date_recorded" label="Date" type="date" :value="!empty($record->id) ? $record->date_recorded->format('Y-m-d') : null" required />
    </div>

    <div class="form_group">
        <x-input name="number_of_birds" label="Numbers of Birds on Farm" type="number" min="1" required />
    </div>

    <div class="form_group">
        <x-input
            name="feed_consumed_bags"
            id="feed_consumed_bags"
            label="Feeds (in bags)"
            type="number"
            min="1"
            required
        />
    </div>

    <div class="form_group">
        <x-input
            name="feed_price_per_bag"
            id="feed_price_per_bag"
            label="Feed Price per bag (in naira)"
            type="number"
            min="1"
            step="0.01"
            required
        />
    </div>

    <div class="form_group">
        <x-input
            name="disabled_total_feed_cost"
            id="disabled_total_feed_cost"
            label="Cost of Feeds (Naira)"
            class="bg-white"
            type="number"
            :value="$totalFeedCost"
            min="1"
            step="0.01"
            disabled
            required
        />
        <x-input-hidden
            name="total_feed_cost"
            id="total_feed_cost"
        />
    </div>

    <div class="form_group">
        <x-input name="payable_to_supplier" label="Payable to Suppliers (Naira)" type="number" min="0" step="0.01" />
    </div>

    <div class="form_group">
        <x-input
            name="other_expenses"
            id="other_expenses"
            label="Other Expense (Naira)"
            type="number"
            min="0"
            step="0.01"
        />
    </div>

    <div class="form_group">
        <x-input
            name="total_expenses"
            id="disabled_total_expenses"
            label="Total Expense (Naira)"
            type="number"
            min="1"
            step="0.01"
            required
            readonly
            ariaReadonly
        />
        <x-input-hidden
            name="total_expenses"
            id="total_expenses"
        />
    </div>

    <div class="form_group">
        <x-input name="units_of_eggs_produced" id="units_of_eggs_produced" label="Numbers of Eggs Produced" type="number" min="1" required />
    </div>
    
    <div class="form_group">
        <x-input
            name="crates_of_eggs_produced"
            id="disabled_crates_of_eggs_produced"
            label="Numbers of Crates"
            type="number"
            class="bg-white"
            min="0"
            readonly
            required
        />
        <x-input-hidden
            name="crates_of_eggs_produced"
            id="crates_of_eggs_produced"
        />
        <x-field-error name="crates_of_eggs_produced" />
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
        <button class="btn button" type="submit" id="submit-button">Submit</button>
    </div>
{!! Form::close() !!}

@section('bottom-scripts')
<script>
$(function() {
    let $btnSubmit = $('#submit-button')
    let $inputNumberOfEggs = $('#units_of_eggs_produced')
    let $inputNumberOfCrates = $('#disabled_crates_of_eggs_produced')
    let $hiddenInputNumberOfCrates = $('#crates_of_eggs_produced')
    
    let $inputFeedConsumedBags = $('#feed_consumed_bags')
    let $inputFeedPricePerBag = $('#feed_price_per_bag')
    let $inputTotalFeedCost = $('#disabled_total_feed_cost')
    let $hiddenInputTotalFeedCost = $('#total_feed_cost')

    let $inputOtherExpense = $('#other_expenses')
    let $inputTotalExpenses = $('#total_expenses')
    let $disabledInputTotalExpenses = $('#disabled_total_expenses')

    const validator = $("#production-form").validate({
        submitHandler: function(form) {
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
                digits: true,
                min: 1,
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
            units_of_eggs_produced: {
                required: true,
                min: 1,
                max: 99999999,
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

    function calculateNumberOfCrates() {
        let numberOfEggs = Number($inputNumberOfEggs.val()) || 0
        let numberOfCrates = !numberOfEggs ? 0 : (numberOfEggs / 30).toFixed(1)
        $inputNumberOfCrates.val(numberOfCrates)
        $hiddenInputNumberOfCrates.val(numberOfCrates)
        console.log(`Number of crates: ${numberOfCrates}`)
    }

    function calculateTotalFeedCost() {
        const numberOfBags = Number($inputFeedConsumedBags.val()) || 0
        const pricePerBag = Number($inputFeedPricePerBag.val()) || 0
        const totalFeedCost = (numberOfBags * pricePerBag).toFixed(2)
        $inputTotalFeedCost.val(totalFeedCost)
        $hiddenInputTotalFeedCost.val(totalFeedCost)
        calculateTotalExpenses()
    }

    function calculateTotalExpenses() {
        const totalFeedCost = Number($hiddenInputTotalFeedCost.val()) || 0
        const otherExpenses = Number($inputOtherExpense.val()) || 0
        const totalExpenses = (totalFeedCost + otherExpenses).toFixed(2)
        $inputTotalExpenses.val(totalExpenses)
        $disabledInputTotalExpenses.val(totalExpenses)
    }

    $inputNumberOfEggs.on('change keyup', () => calculateNumberOfCrates())
    $inputFeedConsumedBags.on('change keyup', () => calculateTotalFeedCost())
    $inputFeedPricePerBag.on('change keyup', () => calculateTotalFeedCost())
    $inputOtherExpense.on('change keyup', () => calculateTotalFeedCost())

})
</script>
    
@endsection

