<?php

namespace LdapRecord\Browser\Livewire;

use LdapRecord\Browser\Browser;
use Livewire\Component;
use LdapRecord\Browser\ModelType;
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
     * The entry's GUID.
     *
     * @var string
     */
    public $guid;

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

    protected $listeners = ['changed'];

    /**
     * Mount the component.
     *
     * @param LdapEntry $entry
     *
     * @return void
     */
    public function mount(LdapEntry $entry)
    {
        $this->dn = $entry->getDn();
        $this->name = $entry->getName();
        $this->guid = $entry->getConvertedGuid();
        $this->type = ModelType::resolve($entry);
        $this->expandable = $this->type === ModelType::CONTAINER;

        $this->expanded = session($this->guid, false);
    }

    /**
     * Toggle the expansion of the leaf entry.
     *
     * @return void
     */
    public function toggle()
    {
        $this->expanded = ! $this->expanded;

        session([$this->guid => $this->expanded]);
    }

    public function changed($guid)
    {
        if ($guid === $this->guid) {
            $this->mount(
                Browser::model()->findByGuidOrFail($guid)
            );
        }
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
