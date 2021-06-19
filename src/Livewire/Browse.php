<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;

class Browse extends Component
{
    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.browse')->layout('ldap::app');
    }
}
