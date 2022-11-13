<?php

namespace App\Http\Requests;

use App\Models\ProductionRecord;
use Illuminate\Foundation\Http\FormRequest;

class SaveProductionRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // To do: check user type when editing
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date_recorded' => 'required|date|before_or_equal:today|unique:' . ProductionRecord::class,
            'number_of_birds' => 'required|integer|min:1|max:999999',
            'feed_consumed_bags' => 'required|integer|min:1|max:999999',
            'feed_price_per_bag' => 'required|numeric|min:1|max:999999',
            'total_feed_cost' => 'required|numeric|min:1|max:99999999',
            'payable_to_supplier' => 'nullable|numeric|min:0|max:99999999',
            'other_expenses' => 'nullable|numeric|min:0|max:99999999',
            'total_expenses' => 'required|numeric|min:1|max:99999999',
            'units_of_eggs_produced' => 'required|integer|min:1|max:999999',
            'crates_of_eggs_produced' => 'required|numeric|min:1|max:999999',
            'number_of_cracked_eggs' => 'nullable|numeric|min:0|max:99999',
            'bird_mortalities' => 'nullable|numeric|min:0|max:999999',
            'comments' => 'nullable|string|max:1000',
        ];
    }
}
