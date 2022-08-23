<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        App::setLocale(Session::get('language', config('app.locale')));

        View::share('translations', collect(File::allFiles(resource_path('lang/' . App::getLocale())))->flatMap(function ($file) {
            return [
                ($translation = $file->getBasename('.php')) => trans($translation),
            ];
        })->toJson());

        return $next($request);
    }
}