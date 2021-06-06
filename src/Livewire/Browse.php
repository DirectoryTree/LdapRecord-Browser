<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;

class Browse extends Component
{
    public $connection;

    public function mount($connection)
    {
        $this->connection = $connection;
    }

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
