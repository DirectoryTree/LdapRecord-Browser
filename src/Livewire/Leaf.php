<?php

namespace LdapRecord\Browser\Livewire;

use LdapRecord\Browser\ModelType;
use Livewire\Component;

class Leaf extends Component
{
    use ViewsModel;

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
     * Mount the component.
     *
     * @param string $guid
     *
     * @return void
     */
    public function mount($guid)
    {
        $this->guid = $guid;

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
