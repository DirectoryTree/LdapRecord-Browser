<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;

class Actions extends Component
{
    use ViewsModel;
    use FlashesMessages;

    /**
     * Mount the component.
     *
     * @param string $guid
     *
     * @return void
     */
    public function mount($guid)
    {
        $this->guid = $guid;
    }
    
    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.actions');
    }
}
