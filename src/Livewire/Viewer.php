<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;
use LdapRecord\Browser\Browser;
use LdapRecord\Browser\ModelType;

class Viewer extends Component
{
    /**
     * The LDAP entry.
     *
     * @var \LdapRecord\Models\Model
     */
    protected $entry;

    /**
     * The LDAP entry's type.
     *
     * @var string|null
     */
    protected $type;

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
        $this->entry = Browser::model(Browser::connection())->findOrFail($dn);
        $this->type = ModelType::resolve($this->entry);
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.viewer', [
            'entry' => $this->entry,
            'type' => $this->type,
        ]);
    }
}
