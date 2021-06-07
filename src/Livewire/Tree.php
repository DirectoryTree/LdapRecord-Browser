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
     * The connection name.
     *
     * @var string
     */
    public $connection;

    /**
     * Mount the component.
     *
     * @param string|null $base
     * @param bool|false $nested
     * @param string|null $connection
     *
     * @return void
     */
    public function mount($base = null, $nested = false, $connection = null)
    {
        $this->base = $base;
        $this->nested = $nested;
        $this->connection = $connection;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $query = Browser::model($this->connection)->listing();

        if ($this->base) {
            $query->in($this->base);
        }
        
        return view('ldap::livewire.tree', ['entries' => $query->get()]);
    }
}
