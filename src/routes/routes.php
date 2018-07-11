<?php

Route::group([
    'prefix' => 'dashboard/tech',
    'middleware' => ['web', 'auth'],
    ], function () {

        Route::get('/', function () {
            $allFiles = File::allFiles(__DIR__.'/../resources/views/tech/');

            $content = view('dashboard::tech.all', compact('allFiles'))->render();

            $dashboard = app(\Webmagic\Dashboard\Dashboard::class);
            $dashboard->content($content);

            return $dashboard->render();

        });

        Route::get('{view}', function ($view){


            $viewName = "dashboard::tech.$view";
            if (!view()->exists($viewName)) {
                abort(404);
            }

            $dashboard = app(\Webmagic\Dashboard\Dashboard::class);
            $dashboard->content(view($viewName)->render());

            return $dashboard->render();
        });

    });