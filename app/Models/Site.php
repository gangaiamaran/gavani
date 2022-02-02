<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\User;
use App\Models\Traits\TimeStamp;
use App\Models\Traits\UserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Site extends BaseModel
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    use TimeStamp;
    use UserStamp;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'friendly_name',
        'is_domain_valid',
        'check_ssl',
        'check_domain',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_domain_valid' => 'boolean',
        'check_ssl' => 'boolean',
        'check_domain' => 'boolean',
    ];



    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the User that Created the Site
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * Get the User that Updated the Site
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }


    /*
    |--------------------------------------------------------------------------
    | ACTIVITY LOG
    |--------------------------------------------------------------------------
    */

    /**
     * Get the Options for LogsActivity
     *
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->useLogName(config('gavani.model.activity_log.log_name'))
            ->dontSubmitEmptyLogs()
            ->logOnlyDirty()
            ->setDescriptionForEvent(function ($eventName) {
                return Str::of(self::class)
                    ->append('::')
                    ->append($eventName)
                    ->__toString();
            });
    }
}
