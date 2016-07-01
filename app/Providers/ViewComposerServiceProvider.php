<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeFooter();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Footer View Composer
     * Returns personal life articles
     * 
     * @return type
     */
    private function composeFooter()
    {
        view()->composer('front.footer.personal_life', 'App\Acme\Composers\FooterComposer@compose');
    }
}
