<?php

namespace App\Providers;

use App\FirestoreClientManager;
use App\Model\CategoryBlog;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use Google\Cloud\Firestore\FirestoreClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton('firebase', function ($app) {
        //     if (is_null(self::$client)) {
        //         self::$client = new FirestoreClient(['projectId' => 'cooking-89482']);
        //     }
        //     return self::$client;
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        try{

        }catch(\Exception $e){}
    }
}
