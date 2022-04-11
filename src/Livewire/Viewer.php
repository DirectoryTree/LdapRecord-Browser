<?php

namespace LdapRecord\Browser\Livewire;

use LdapRecord\Browser\Browser;
use LdapRecord\Models\Attributes\DistinguishedName;
use Livewire\Component;

class Viewer extends Component
{
    use ViewsModel;

    /**
     * The LDAP model's type.
     *
     * @var string|null
     */
    protected $type;

    /**
     * The events to listen for.
     *
     * @var array
     */
    protected $listeners = [
        'model.selected' => 'selected',
        'model.discover' => 'discover',
    ];

    /**
     * The query string watcher.
     *
     * @var array
     */
    protected $queryString = [
        'guid' => ['except' => ''],
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
     * Load a model by its discovered distinguished name.
     *
     * @param string $dn
     *
     * @return void
     */
    public function discover($dn)
    {
        $this->emit('model.selected', Browser::model()->findOrFail($dn)->getConvertedGuid());
    }

    /**
     * Determine if the given value is a distinguished name.
     *
     * @param string $value
     *
     * @return bool
     */
    public function isDn($value)
    {
        $values = array_filter(DistinguishedName::make($value)->values());

        return ! empty($values);
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
