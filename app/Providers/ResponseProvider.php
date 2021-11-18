<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ResponseProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('success', function ($message = '', $data = null, $status = 200) use ($factory) {
            $format = [
                'success' => true,
                'message' => $message,
                'data' => $data,
            ];

            return $factory->make($format,$status);
        });

        $factory->macro('error', function ($message = '', $errors = [], $status = 404) use ($factory){
            $format = [
                'success' => false,
                'message' => $message,
                'data' => $errors,
            ];

            return $factory->make($format,$status);
        });
    }
}
