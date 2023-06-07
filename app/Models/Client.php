<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\ClientFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $address
 * @property string $phone
 * @property string $birthday
 * @property int|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ClientFactory factory($count = null, $state = [])
 * @method static Builder|Client newModelQuery()
 * @method static Builder|Client newQuery()
 * @method static Builder|Client query()
 * @method static Builder|Client whereAddress($value)
 * @method static Builder|Client whereBirthday($value)
 * @method static Builder|Client whereCreatedAt($value)
 * @method static Builder|Client whereId($value)
 * @method static Builder|Client wherePhone($value)
 * @method static Builder|Client whereUpdatedAt($value)
 * @method static Builder|Client whereUserId($value)
 * @mixin Eloquent
 */
class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
        'birthday',
        'user_id'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function statements(): HasMany
    {
        return $this->hasMany(Statement::class);
    }
}
