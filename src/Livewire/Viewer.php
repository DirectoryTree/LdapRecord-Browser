<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;
use LdapRecord\Browser\Browser;
use LdapRecord\Browser\ModelType;

class Viewer extends Component
{
    /**
     * The guid of the model being viewed.
     *
     * @var string|null
     */
    public $guid;

    /**
     * The LDAP entry.
     *
     * @var \LdapRecord\Models\Model
     */
    protected $entry;

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
    protected $listeners = ['selected', 'changed', 'deleted'];

    /**
     * The query string
     *
     * @var array
     */
    protected $queryString = [
        'guid'=> ['except'=> ''],
    ];

    /**
     * Mount the component.
     *
     * @param string $guid
     *
     * @return void
     */
    public function mount()
    {
        if ($this->guid) {
            $this->load($this->guid);
        }
    }

    /**
     * Load the selected entry.
     *
     * @param string $guid
     *
     * @return void
     */
    public function selected($guid)
    {
        $this->load($guid);
    }

    public function changed($guid)
    {
        if ($this->guid === $guid) {
            $this->load($guid);
        }
    }

    public function deleted($guid)
    {
        if ($this->guid === $guid) {
            $this->guid = null;
            $this->type = null;
            $this->entry = null;
        }
    }

    /**
     * Load the model by its guid.
     *
     * @param string $guid
     *
     * @return void
     */
    protected function load($guid)
    {
        $this->entry = Browser::model()->findByGuidOrFail($guid);

        $this->type = ModelType::resolve($this->entry);

        $this->guid = $this->entry->getConvertedGuid();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.viewer', [
            'entry' => $this->entry,
            'type' => $this->type,
        ]);
    }
}
