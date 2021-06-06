<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;
use LdapRecord\Models\Entry;

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
     * @var bool
     */
    public $nested = false;

    /**
     * Mount the component.
     *
     * @param string $base
     * @param bool $nested
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
        $query = Entry::query()->listing();

        if ($this->base) {
            $query->in($this->base);
        }
        
        return view('ldap::livewire.tree', ['entries' => $query->get()]);
    }
}
