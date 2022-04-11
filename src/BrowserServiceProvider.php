<?php

namespace LdapRecord\Browser;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

class BrowserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->afterResolving(BladeCompiler::class, function () {
            $this->registerLivewireComponent('leaf', \LdapRecord\Browser\Livewire\Leaf::class);
            $this->registerLivewireComponent('tree', \LdapRecord\Browser\Livewire\Tree::class);
            $this->registerLivewireComponent('flash', \LdapRecord\Browser\Livewire\Flash::class);
            $this->registerLivewireComponent('browse', \LdapRecord\Browser\Livewire\Browse::class);
            $this->registerLivewireComponent('viewer', \LdapRecord\Browser\Livewire\Viewer::class);
            $this->registerLivewireComponent('search', \LdapRecord\Browser\Livewire\Search::class);
            $this->registerLivewireComponent('rename', \LdapRecord\Browser\Livewire\Rename::class);
            $this->registerLivewireComponent('delete', \LdapRecord\Browser\Livewire\Delete::class);
            $this->registerLivewireComponent('actions', \LdapRecord\Browser\Livewire\Actions::class);
        });

        Browser::models([
            ModelType::USER => \LdapRecord\Models\ActiveDirectory\User::class,
            ModelType::GROUP => \LdapRecord\Models\ActiveDirectory\Group::class,
            ModelType::DEFAULT => \LdapRecord\Models\ActiveDirectory\Entry::class,
            ModelType::UNKNOWN => \LdapRecord\Models\ActiveDirectory\Entry::class,
            ModelType::COMPUTER => \LdapRecord\Models\ActiveDirectory\Computer::class,
            ModelType::CONTAINER => \LdapRecord\Models\ActiveDirectory\Container::class,
        ]);

        Browser::resolveConnectionWith(function () {
            return request()->route('connection', function () {
                $route = app('router')->getRoutes()->match(
                    Request::create(request()->headers->get('referer'))
                );

                return optional($route)->parameter('connection');
            });
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ldap');
    }

    /**
     * Register a livewire component.
     *
     * @param string $name
     * @param string $component
     *
     * @return void
     */
    protected function registerLivewireComponent($name, $component)
    {
        Livewire::component("ldap.$name", $component);
    }
}
