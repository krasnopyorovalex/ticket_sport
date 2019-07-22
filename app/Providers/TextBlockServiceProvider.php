<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\TextBlockComposer;
use Illuminate\Contracts\Container\BindingResolutionException;

class TextBlockServiceProvider extends ServiceProvider
{
    /**
     * @throws BindingResolutionException
     */
    public function register(): void
    {
        $this->app->make('view')->composer(['layouts.app','page.index'], TextBlockComposer::class);
    }
}
