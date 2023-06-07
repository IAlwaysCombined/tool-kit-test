<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Statement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Client::factory(50)
            ->has(Statement::factory(10))
            ->create();
    }
}
