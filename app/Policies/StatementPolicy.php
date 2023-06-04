<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\Statement;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatementPolicy
{
    use HandlesAuthorization;

    /**
     * @param Client $client
     * @param Statement $statement
     * @return bool
     */
    public function update(Client $client, Statement $statement): bool
    {
        return $client->id === $statement->client_id;
    }

    public function delete(Client $client, Statement $statement): bool
    {
        return $client->id === $statement->client_id;
    }
}
