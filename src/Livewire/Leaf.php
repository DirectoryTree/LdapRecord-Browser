<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;
use LdapRecord\Browser\TypeResolver;
use LdapRecord\Models\Entry as LdapEntry;

class Leaf extends Component
{
    /**
     * The entry's DN.
     *
     * @var string
     */
    public $dn;

    /**
     * The entry's name.
     *
     * @var string
     */
    public $name;

    /**
     * The entry's type.
     *
     * @var string
     */
    public $type;

    /**
     * Whether the entry is expanded.
     *
     * @var string
     */
    public $expanded = false;
    
    /**
     * Whether the entry is expandable.
     *
     * @var string
     */
    public $expandable = false;

    /**
     * The connection name.
     *
     * @var string
     */
    public $connection;

    /**
     * Mount the component.
     *
     * @param LdapEntry $entry
     * @param string $connection
     *
     * @return void
     */
    public function mount(LdapEntry $entry, $connection)
    {
        $this->dn = $entry->getDn();
        $this->name = $entry->getName();
        $this->type = (new TypeResolver($entry->objectclass ?? []))->get();
        $this->expandable = $this->type === TypeResolver::CONTAINER;
        $this->connection = $connection;
    }

    /**
     * Toggle the expansion of the leaf entry.
     *
     * @return void
     */
    public function toggle()
    {
        $this->expanded = ! $this->expanded;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.leaf');
    }
}
