<?php

namespace LdapRecord\Browser;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use LdapRecord\Browser\Livewire\Leaf;
use LdapRecord\Browser\Livewire\Tree;
use LdapRecord\Browser\Livewire\Viewer;

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
            $this->registerLivewireComponent('leaf', Leaf::class);
            $this->registerLivewireComponent('tree', Tree::class);
            $this->registerLivewireComponent('viewer', Viewer::class);
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
