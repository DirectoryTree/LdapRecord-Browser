<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;
use LdapRecord\Container;

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
            'connections' => array_keys($container->all())
        ])->layout('ldap::app');
    }
}
