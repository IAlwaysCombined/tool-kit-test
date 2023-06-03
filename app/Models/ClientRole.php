<?php

namespace App\Models;

use Database\Factories\ClientRoleFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ClientRole
 *
 * @property int $id
 * @property int|null $role_id
 * @property int|null $client_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ClientRoleFactory factory($count = null, $state = [])
 * @method static Builder|ClientRole newModelQuery()
 * @method static Builder|ClientRole newQuery()
 * @method static Builder|ClientRole query()
 * @method static Builder|ClientRole whereClientId($value)
 * @method static Builder|ClientRole whereCreatedAt($value)
 * @method static Builder|ClientRole whereId($value)
 * @method static Builder|ClientRole whereRoleId($value)
 * @method static Builder|ClientRole whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ClientRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'client_id'
    ];
}
