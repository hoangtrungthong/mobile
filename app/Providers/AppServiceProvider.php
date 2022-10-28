<?php

namespace App\Providers;

use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\URL;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(
        CategoryRepository $categoryRepository,
        UserRepository $userRepository,
        UrlGenerator $url
    ) {
        if (env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }
        // if ($this->app->environment('production')) {
        //     URL::forceScheme('https');
        // }
        if (!app()->runningInConsole()) {
            $categories = $categoryRepository->whereParent(config('const.users.status.active'))->get();

            $notifications = $userRepository->getNotifications()->sortByDesc('created_at');

            $read = $userRepository->getNotifications()->where('read_at', null);

            $data = [
                'notifications' => $notifications,
                'read' => $read,
                'now' => Carbon::now(),
                'categories' => $categories,
            ];

            View::share('data', $data);
        }
    }
}
