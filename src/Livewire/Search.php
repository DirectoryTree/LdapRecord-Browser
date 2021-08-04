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
     * The event listeners.
     *
     * @var array
     */
    protected $listeners = ['model.selected' => 'dismiss'];

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
     * Dismiss the search modal.
     *
     * @return void
     */
    public function dismiss()
    {
        $this->searching = false;
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
