<?php

namespace App\Models;

use App\Models\Traits\TimeStamp;
use App\Models\Traits\UserStamp;
use App\Observers\SiteObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Site
 *
 * @property int $id
 * @property string $url
 * @property string|null $friendly_name
 * @property bool $is_domain_valid
 * @property bool $check_ssl
 * @property bool $check_domain
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Database\Factories\SiteFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Site newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Site newQuery()
 * @method static \Illuminate\Database\Query\Builder|Site onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Site query()
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereCheckDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereCheckSsl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereFriendlyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereIsDomainValid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|Site withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Site withoutTrashed()
 * @mixin \Eloquent
 */
class Site extends BaseModel
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
        'is_domain_valid' => 'boolean',
        'check_ssl' => 'boolean',
        'check_domain' => 'boolean',
    ];

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
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::observe(SiteObserver::class);
    }

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
     * Get the User that Updated the Site
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
