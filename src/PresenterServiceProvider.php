<?php

namespace gocrew\LaravelPresenter;

use Illuminate\Support\ServiceProvider;

class PresenterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            'gocrew\LaravelPresenter\PresenterMakeCommand',
        ]);
    }
}
