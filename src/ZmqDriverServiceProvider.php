<?php

namespace Cxbyte\ZmqDriver;

use Illuminate\Support\ServiceProvider;

class ZmqDriverServiceProvider extends ServiceProvider
{
    public function register()
    {
        /**@var \Illuminate\Config\Repository $appConfig*/
        $appConfig = $this->app['config'];

        $broadcastingConfig = $appConfig->get('broadcasting', []);
        $packageConfig = require __DIR__ . '/../config/broadcasting.php';

        $appConfig->set(
            'broadcasting',
            array_merge_recursive($packageConfig, $broadcastingConfig)
        );

        $this->app->singleton(
            'Illuminate\Broadcasting\BroadcastManager',
            function (\Illuminate\Foundation\Application $app) {
                return new ZmqBroadcastManager($app);
            }
        );

        $this->app->singleton(
            'Illuminate\Contracts\Broadcasting\Broadcaster',
            function (\Illuminate\Foundation\Application $app) {
                return $app
                    ->make('Illuminate\Broadcasting\BroadcastManager')
                    ->connection();
            }
        );

        $this->app->alias(
            'Illuminate\Broadcasting\BroadcastManager',
            'Illuminate\Contracts\Broadcasting\Factory'
        );
    }
}
