<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;
use LdapRecord\Models\ActiveDirectory\Entry;

class Viewer extends Component
{
    /**
     * The LDAP entry.
     *
     * @var \LdapRecord\Models\Model
     */
    protected $entry;

    /**
     * The events to listen for.
     *
     * @var array
     */
    protected $listeners = ['selected'];

    /**
     * Load the selected entry.
     *
     * @param string $dn
     *
     * @return void
     */
    public function selected($dn)
    {
        $this->entry = Entry::findOrFail($dn);
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.viewer', ['entry' => $this->entry]);
    }
}
