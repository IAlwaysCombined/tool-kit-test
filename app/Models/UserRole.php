<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\UserRoleFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ClientRole
 *
 * @property int $id
 * @property int|null $role_id
 * @property int|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static UserRoleFactory factory($count = null, $state = [])
 * @method static Builder|UserRole newModelQuery()
 * @method static Builder|UserRole newQuery()
 * @method static Builder|UserRole query()
 * @method static Builder|UserRole whereClientId($value)
 * @method static Builder|UserRole whereCreatedAt($value)
 * @method static Builder|UserRole whereId($value)
 * @method static Builder|UserRole whereRoleId($value)
 * @method static Builder|UserRole whereUpdatedAt($value)
 * @mixin Eloquent
 */
class UserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'user_id'
    ];
}
