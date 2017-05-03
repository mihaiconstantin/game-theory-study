<?php

namespace App\Providers;

use App\Helpers\GameViewDataHelper;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // /**
        //  * Make game data available to all _play partial views.
        //  */
        // view()->composer('partials._play', function($view) {
        //     $view->with([
        //         'play_data' => GameViewDataHelper::playViewData(),
        //         'route_name' => Route::currentRouteName()
        //     ]);
        // });
        //
        //
        // /**
        //  * Make game score data available to all _score partial views.
        //  */
        // view()->composer('partials._score', function($view) {
        //     $view->with('score_data', GameViewDataHelper::scoreViewData());
        // });
        //
        //
        // /**
        //  * Make game result data available to all _result partial views.
        //  */
        // view()->composer('partials._result', function($view) {
        //     $view->with('result_data', GameViewDataHelper::resultViewData());
        // });
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
}
