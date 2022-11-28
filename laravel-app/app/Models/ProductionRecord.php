<?php

namespace App\Models;

use App\Models\Traits\RecordsCreatorAndUpdater;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class ProductionRecord extends Model
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
     * @param integer|null $id
     * @return array
     */
    public static function validationRules(?int $id = null): array
    {
        $dateRecordedUniqueRule = Rule::unique('production_records');

        if (!is_null($id)) {
            $dateRecordedUniqueRule->ignore((int) $id);
        }

        $dateRecordedRule = [
            'required',
            'date',
            'before_or_equal:today',
            $dateRecordedUniqueRule,
        ];

        $rules = [
            'date_recorded' => $dateRecordedRule,
            'number_of_birds' => 'required|integer|min:1|max:999999',
            'feed_consumed_bags' => 'required|numeric|min:1|max:999999',
            'feed_price_per_bag' => 'required|numeric|min:1|max:999999',
            'total_feed_cost' => 'required|numeric|min:1|max:9999999999',
            'payable_to_supplier' => 'nullable|numeric|min:0|max:9999999999',
            'other_expenses' => 'nullable|numeric|min:0|max:9999999999',
            'total_expenses' => 'required|numeric|min:1|max:9999999999',
            'units_of_eggs_produced' => 'required|integer|min:1|max:999999',
            'crates_of_eggs_produced' => 'required|numeric|min:1|max:999999',
            'number_of_cracked_eggs' => 'nullable|numeric|min:0|max:99999',
            'bird_mortalities' => 'nullable|numeric|min:0|max:999999',
            'comments' => 'nullable|string|max:1000',
        ];

        return $rules;
    }

}
