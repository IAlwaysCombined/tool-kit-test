<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Statement;
use App\Policies\StatementPolice;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Statement::class => StatementPolice::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
