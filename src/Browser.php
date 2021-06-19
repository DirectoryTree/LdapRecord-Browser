<?php

namespace LdapRecord\Browser;

use Closure;
use LdapRecord\Container;
use Illuminate\Support\Facades\Route;
use LdapRecord\Browser\Livewire\Browse;
use LdapRecord\Browser\Livewire\Connections;

class Browser
{
    /**
     * The configured models.
     *
     * @var array
     */
    public static $models = [
        'default' => [],
    ];

    /**
     * The connection resolver.
     *
     * @var Closure
     */
    protected static $connectionResolver;

    /**
     * Register the browser routes.
     *
     * @return void
     */
    public static function routes()
    {
        Route::get('/', Connections::class)->name('ldap::connections');
        Route::get('/{connection}', Browse::class)->name('ldap::browse');
    }

    /**
     * Set the model to use for the given connection.
     *
     * @param string $model
     * @param string $type
     * @param string|null $on
     *
     * @return void
     */
    public static function use($model, $type, $connection = null)
    {
        $container = Container::getInstance();

        static::$models[$connection ?? $container->getDefaultConnectionName()][$type] = $model;
    }

    /**
     * Set the models to use.
     *
     * @param array $models
     * @param string|null $connection
     *
     * @return void
     */
    public static function models($models, $connection = null)
    {
        foreach ($models as $type => $model) {
            static::use($model, $type, $connection);
        }
    }
    
    /**
     * Fetch the currently browsed LDAP connection.
     *
     * @return string
     */
    public static function connection()
    {
        return value(static::$connectionResolver);
    }

    /**
     * Fetch the model to use for the connection.
     *
     * @param string $connection
     * @param string $type
     *
     * @return \LdapRecord\Models\Model
     */
    public static function model($connection, $type = 'default')
    {
        return new static::$models[$connection][$type];
    }

    /**
     * Set the callback to use for resolving the current LDAP connection.
     *
     * @param Closure $callback
     *
     * @return void
     */
    public static function resolveConnectionWith(Closure $callback)
    {
        static::$connectionResolver = $callback;
    }
}
