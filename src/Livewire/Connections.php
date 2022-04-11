<?php

namespace LdapRecord\Browser\Livewire;

use LdapRecord\Container;
use Livewire\Component;

class Connections extends Component
{
    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $container = Container::getInstance();

        return view('ldap::livewire.connections', [
            'connections' => array_keys($container->all()),
        ])->layout('ldap::app');
    }
}
