<?php

namespace App\Models\Scans;

use App\Models\Traits\TimeStamp;
use App\Models\Traits\UserStamp;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SslCertificateScan extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    use TimeStamp;
    use UserStamp;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_id',
        'issued_by',
        'domain_name',
        'additional_domains',
        'valid_from',
        'valid_till',
        'is_ssl_certificate_valid',
        'is_ssl_certificate_expired',
    ];



    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the User that Created the SslCertificateScan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
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

    /**
     * Get the User that Updated the SslCertificateScan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
