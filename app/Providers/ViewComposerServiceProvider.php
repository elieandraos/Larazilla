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
        $this->composeMenuPersonal();
        $this->composeMenuOffical();
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


     /**
     * Mega Menu Personal Life section
     * Returns personal life articles
     * 
     * @return type
     */
    private function composeMenuPersonal()
    {
        view()->composer('front.header.personal_life', 'App\Acme\Composers\MenuComposer@personal');
    }

         /**
     * Mega Menu Personal Life section
     * Returns personal life articles
     * 
     * @return type
     */
    private function composeMenuOffical()
    {
        view()->composer('front.header.official_life', 'App\Acme\Composers\MenuComposer@official');
    }
}
