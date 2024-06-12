<?php

namespace App\Providers;

use App\Repositories\Api\v2\Contracts\PostRepositoryContract;
use App\Repositories\Api\v2\PostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PostRepositoryContract::class,
            PostRepository::class
        );
    }
}
