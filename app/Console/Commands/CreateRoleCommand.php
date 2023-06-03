<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

class CreateRoleCommand extends Command
{
    private Role $role;

    public function __construct(Role $role)
    {
        parent::__construct();
        $this->role = $role;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-role-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create roles';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $roles = [
            ['name' => 'USER'],
            ['name' => 'ADMIN'],
        ];

        foreach ($roles as $role){
            $this->role::query()->create($role);
        }
    }
}
