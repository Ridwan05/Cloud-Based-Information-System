<?php

namespace App\Http\Requests;

use App\Models\SalesRecord;
use Illuminate\Foundation\Http\FormRequest;

class SaveSalesRecordRequest extends FormRequest
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
            'date_recorded' => 'required|date|before_or_equal:today',
            'available_stock' => 'required|integer|min:1|max:999999',
            'price_per_crate' => 'required|numeric|min:1|max:999999',
            'crates_sold' => 'required|integer|min:1|max:999999',
            'total_revenue' => 'required|numeric|min:1|max:999999',
            'outstanding_balance' => 'required|numeric|min:1|max:999999',
            'balance_payment' => 'required|numeric|min:1|max:999999',
            'cash_transfer_to_production' => 'required|numeric|min:1|max:999999',
            'bank_deposit' => 'required|numeric|min:1|max:999999',
            'comments' => 'nullable|string|max:1000',
        ];
    }
}
