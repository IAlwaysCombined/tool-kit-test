<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\StatementFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Statement
 *
 * @property int $id
 * @property string $name
 * @property int $number
 * @property string $file
 * @property int|null $client_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static StatementFactory factory($count = null, $state = [])
 * @method static Builder|Statement newModelQuery()
 * @method static Builder|Statement newQuery()
 * @method static Builder|Statement query()
 * @method static Builder|Statement whereClientId($value)
 * @method static Builder|Statement whereCreatedAt($value)
 * @method static Builder|Statement whereFile($value)
 * @method static Builder|Statement whereId($value)
 * @method static Builder|Statement whereName($value)
 * @method static Builder|Statement whereNumber($value)
 * @method static Builder|Statement whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Statement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'file',
        'client_id',
    ];

    /**
     * @return void
     */
    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->client_id = auth()->user()->getAuthIdentifier();
        });
    }
}
