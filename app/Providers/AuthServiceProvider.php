<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Passport configuration
        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }

        // Token Lifetimes for passport
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));

        // Defining scopes for the tokens

        Passport::tokensCan([
            'get-email' => 'Retrieve your email address associeted with your account.',
            'create-posts' => 'Create posts on behalf of your user.',
            'list-posts' => 'List posts on behalf of your user.',
        ]);


        // if no scopes are defined, use this scopes:
        Passport::setDefaultScope([
            'get-email',
            'create-posts',
            'list-posts',
        ]);


    }
}
