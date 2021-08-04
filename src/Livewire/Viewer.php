<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;

class Viewer extends Component
{
    use ViewsModel;

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
    protected $listeners = ['model.selected' => 'selected'];

    /**
     * The query string
     *
     * @var array
     */
    protected $queryString = [
        'guid'=> ['except'=> ''],
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
        return view('ldap::livewire.viewer');
    }
}
