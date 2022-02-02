<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;

trait TimeStamp
{
    /**
     * Boot Method of the Trait.
     *
     * @return void
     */
    public static function bootTimeStamp()
    {
        static::creating(function (Model $model) {
            $createdAtColumn = $model::CREATED_AT;
            $model->$createdAtColumn = now();
        });

        static::updating(function (Model $model) {
            $updatedAtColumn = $model::UPDATED_AT;
            $model->$updatedAtColumn = now();
        });
    }

    /**
     * Determine if the model uses timestamps.
     *
     * @return bool
     */
    public function usesTimestamps()
    {
        return false;
    }
}
