<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;
use LdapRecord\Browser\Browser;

class Search extends Component
{
    /**
     * Whether the search dialog is open.
     *
     * @var bool
     */
    public $searching = false;

    /**
     * The search term.
     *
     * @var string
     */
    public $term = '';
    
    /**
     * The computed search results property.
     *
     * @return bool|\LdapRecord\Models\Collection
     */
    public function getResultsProperty()
    {
        if (empty($this->term)) {
            return false;
        }

        return Browser::model()
            ->whereContains('cn', $this->term)
            ->limit(20)
            ->get();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.search');
    }
}
