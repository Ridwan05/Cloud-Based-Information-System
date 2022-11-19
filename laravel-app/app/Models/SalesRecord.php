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
}
