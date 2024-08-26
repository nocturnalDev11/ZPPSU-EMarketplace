<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\User;
use App\Models\Trade;
use App\Models\Message;
use App\Models\Product;
use App\Models\Services;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\Policies\TradePolicy;
use App\Policies\MessagePolicy;
use App\Policies\ProductPolicy;
use App\Policies\ServicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Message::class => MessagePolicy::class,
        Post::class => PostPolicy::class,
        Product::class => ProductPolicy::class,
        Services::class => ServicePolicy::class,
        Trade::class => TradePolicy::class,
        User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
