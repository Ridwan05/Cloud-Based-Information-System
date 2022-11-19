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
        return SalesRecord::validationRules();
    }
}
