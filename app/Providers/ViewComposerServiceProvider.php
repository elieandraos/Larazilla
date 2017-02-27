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
        $this->composeBio();
        $this->composeMenuPersonal();
        $this->composeMenuOffical();
        $this->composeMenuMediaLibrary();
        $this->composeLangSwitcher();
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
        view()->composer('front.footer.sitemap', 'App\Acme\Composers\FooterComposer@compose');
    }

    public function composeBio()
    {
        view()->composer('front.footer.bio', 'App\Acme\Composers\FooterComposer@bio');
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

    private function composeMenuMediaLibrary()
    {
         view()->composer('front.header.media_library', 'App\Acme\Composers\MenuComposer@medialibrary');
    }

    private function composeLangSwitcher()
    {
        view()->composer('front.header.lang_switcher', 'App\Acme\Composers\MenuComposer@langswitcher');
    }
}
