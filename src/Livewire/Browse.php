<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;

class Browse extends Component
{
    use ViewsModel;

    /**
     * The query string watcher.
     *
     * @var array
     */
    protected $queryString = [
        'guid' => ['except' => ''],
    ];

    /**
     * The events to listen for.
     *
     * @var array
     */
    protected $listeners = [
        'model.selected' => 'selected',
    ];

    /**
     * Load the selected entry.
     *
     * @param string $guid
     *
     * @return void
     */
    public function selected($guid)
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
        return view('ldap::livewire.browse')->layout('ldap::app');
    }
}
