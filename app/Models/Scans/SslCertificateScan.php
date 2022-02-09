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

/**
 * App\Models\Scans\SslCertificateScan
 *
 * @property int $id
 * @property int $site_id
 * @property string|null $issued_by
 * @property string|null $domain_name
 * @property string|null $additional_domains
 * @property string|null $valid_from
 * @property string|null $valid_till
 * @property int|null $is_ssl_certificate_valid
 * @property int|null $is_ssl_certificate_expired
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @method static \Database\Factories\Scans\SslCertificateScanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan newQuery()
 * @method static \Illuminate\Database\Query\Builder|SslCertificateScan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan query()
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereAdditionalDomains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereDomainName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereIsSslCertificateExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereIsSslCertificateValid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereIssuedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereSiteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereValidFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SslCertificateScan whereValidTill($value)
 * @method static \Illuminate\Database\Query\Builder|SslCertificateScan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SslCertificateScan withoutTrashed()
 * @mixin \Eloquent
 */
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
        'additional_domains' => 'array',
        'valid_from' => 'datetime',
        'valid_till' => 'datetime',
        'is_ssl_certificate_valid' => 'boolean',
        'is_ssl_certificate_expired' => 'boolean',
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
