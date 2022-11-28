<?php

namespace App\Models;

use App\Models\Traits\RecordsCreatorAndUpdater;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRecord extends Model
{
    use HasFactory;
    use RecordsCreatorAndUpdater;
    
    /**
     * Guarded fields
     * 
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_recorded' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    
    /**
     * Get validation rules for saving production record
     *
     * @return array
     */
    public static function validationRules(): array
    {
        $dateRecordedRule = [
            'required',
            'date',
            'before_or_equal:today',
        ];

        $rules = [
            'date_recorded' => $dateRecordedRule,
            'available_stock' => 'required|integer|min:1|max:999999',
            'price_per_crate' => 'required|numeric|min:1|max:999999',
            'crates_sold' => 'required|integer|min:1|max:999999',
            'total_revenue' => 'required|numeric|min:1|max:9999999999',
            'outstanding_balance' => 'required|numeric|min:1|max:9999999999',
            'balance_payment' => 'required|numeric|min:1|max:9999999999',
            'cash_transfer_to_production' => 'required|numeric|min:1|max:9999999999',
            'bank_deposit' => 'required|numeric|min:1|max:999999',
            'comments' => 'nullable|string|max:1000',
        ];

        return $rules;
    }
}
