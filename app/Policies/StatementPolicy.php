<?php

namespace App\Policies;

use App\Enums\Roles;
use App\Models\Statement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatementPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function view(User $user): bool
    {
        return true;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * @param User $user
     * @param Statement $statement
     * @return bool
     */
    public function update(User $user, Statement $statement): bool
    {
        if ($user->role === Roles::ADMIN->value){
            return true;
        }
        return $user->id === $statement->client_id;
    }

    /**
     * @param User $user
     * @param Statement $statement
     * @return bool
     */
    public function delete(User $user, Statement $statement): bool
    {
        if ($user->role === Roles::ADMIN->value){
            return true;
        }
        return $user->id === $statement->client_id;
    }
}
