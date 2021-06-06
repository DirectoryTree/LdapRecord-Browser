<?php

namespace LdapRecord\Browser;

use Illuminate\Support\Facades\Route;

class Browser
{
    /**
     * Register the browser routes.
     *
     * @return void
     */
    public static function routes()
    {
        Route::get('/', \LdapRecord\Browser\Livewire\Connections::class)->name('ldap::home');
        Route::get('/{connection}', \LdapRecord\Browser\Livewire\Browse::class)->name('ldap::browse');
    }
}
