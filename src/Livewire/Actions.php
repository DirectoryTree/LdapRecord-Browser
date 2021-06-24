<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;
use LdapRecord\Models\Model;
use LdapRecord\Browser\Browser;
use LdapRecord\Browser\ModelType;

class Actions extends Component
{
    use FlashesMessages;

    /**
     * The objects name.
     *
     * @var string
     */
    public $name;

    /**
     * The objects guid.
     *
     * @var string
     */
    public $guid;

    /**
     * The objects type.
     *
     * @var string
     */
    public $type;

    /**
     * Whether the user is renaming the object.
     *
     * @var bool
     */
    public $renaming = false;

    /**
     * Mount the component.
     *
     * @param Model $entry
     *
     * @return void
     */
    public function mount(Model $entry)
    {
        $this->name = $entry->getName();
        $this->guid = $entry->getConvertedGuid();
        $this->type = ModelType::resolve($entry);
    }

    /**
     * An accessor for the model.
     *
     * @return \LdapRecord\Models\Model
     */
    public function getEntryProperty()
    {
        return Browser::model()->findByGuidOrFail($this->guid);
    }

    /**
     * Attempt to rename the object.
     *
     * @return void
     */
    public function rename()
    {
        $this->entry->rename(
            $this->entry->getCreatableRdn($this->name)
        );

        $this->renaming = false;

        $this->emit('changed', $this->entry->getConvertedGuid());

        $this->flash('success', 'Updated');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.actions');
    }
}
