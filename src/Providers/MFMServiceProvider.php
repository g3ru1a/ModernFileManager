<?php

namespace MAZE\MFM\Providers;

use Illuminate\Support\ServiceProvider;

Class MFMServiceProvider extends ServiceProvider{

    public function boot(){
        info('maze/mfm loaded.');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mfm');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/mfm'),
        ], 'public');
    }

    public function register(){

    }

}
