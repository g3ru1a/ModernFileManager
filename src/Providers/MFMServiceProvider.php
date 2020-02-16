<?php

namespace MAZE\MFM\Providers;

use Illuminate\Support\ServiceProvider;

Class MFMServiceProvider extends ServiceProvider{

    public function boot(){
        info('maze/mfm loaded.');
    }

    public function register(){

    }

}
