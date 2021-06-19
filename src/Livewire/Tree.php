<?php

namespace LdapRecord\Browser\Livewire;

use LdapRecord\Browser\Browser;
use Livewire\Component;

class Tree extends Component
{
    /**
     * The base DN to search in.
     *
     * @var string|null
     */
    public $base;

    /**
     * Whether the tree is nested.
     *
     * @var string
     */
    public $nested;

    /**
     * Mount the component.
     *
     * @param string|null $base
     * @param bool|false  $nested
     *
     * @return void
     */
    public function mount($base = null, $nested = false)
    {
        $this->base = $base;
        $this->nested = $nested;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $query = Browser::model(Browser::connection())->listing();

        if ($this->base) {
            $query->in($this->base);
        }
        
        return view('ldap::livewire.tree', ['entries' => $query->get()]);
    }
}
