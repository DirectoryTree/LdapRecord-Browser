<?php

namespace LdapRecord\Browser;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Livewire\Livewire;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

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
            $this->registerLivewireComponent('viewer', \LdapRecord\Browser\Livewire\Viewer::class);
            $this->registerLivewireComponent('search', \LdapRecord\Browser\Livewire\Search::class);
            $this->registerLivewireComponent('actions', \LdapRecord\Browser\Livewire\Actions::class);
        });

        Browser::models([
            'user' => \LdapRecord\Models\ActiveDirectory\User::class,
            'group' => \LdapRecord\Models\ActiveDirectory\Group::class,
            'default' => \LdapRecord\Models\ActiveDirectory\Entry::class,
            'computer' => \LdapRecord\Models\ActiveDirectory\Computer::class,
            'container' => \LdapRecord\Models\ActiveDirectory\Container::class,
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
