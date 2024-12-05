<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\AdminMiddleware;

class HttpServiceProvider extends ServiceProvider
{
    /**
     * Registra os serviços no container.
     */
    public function register()
    {
        //
    }

    /**
     * Configurações relacionadas a middlewares.
     */
    public function boot()
    {
        // Registrar middlewares de rota
        $this->app['router']->aliasMiddleware('admin', AdminMiddleware::class);
    }
}
