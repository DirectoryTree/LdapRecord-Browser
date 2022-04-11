<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;

class Delete extends Component
{
    use ViewsModel;
    use FlashesMessages;

    /**
     * Whether the renaming dialog is being shown.
     *
     * @var bool
     */
    public $deleting = false;

    /**
     * The event listeners.
     *
     * @var array
     */
    protected $listeners = ['model.deleting' => 'show'];

    /**
     * Show the dialog.
     *
     * @param string $guid
     *
     * @return void
     */
    public function show($guid)
    {
        $this->guid = $guid;

        $this->deleting = true;
    }

    /**
     * Attempt to rename the model.
     *
     * @return void
     */
    public function delete()
    {
        $this->model->delete();

        $this->guid = null;

        $this->deleting = false;

        $this->emit('model.deleted', $this->model->getConvertedGuid());

        $this->flash('success', 'Deleted');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.delete');
    }
}
