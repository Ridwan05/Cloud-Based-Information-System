<?php

namespace App\Models\Traits;


trait RecordsCreatorAndUpdater
{

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($record) {
            $record->created_by = auth()->id();
        });

        static::updating(function ($record) {
            $record->updated_by = auth()->id();
        });
    }
}
