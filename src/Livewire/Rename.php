<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;

class Rename extends Component
{
    use ViewsModel;
    use FlashesMessages;

    /**
     * The form data.
     *
     * @var array
     */
    public $form = ['name' => ''];

    /**
     * Whether the renaming dialog is being shown.
     *
     * @var boolean
     */
    public $renaming = false;

    /**
     * The event listeners.
     *
     * @var array
     */
    protected $listeners = ['model.renaming' => 'show'];

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

        data_set($this->form, 'name', $this->model->getName());

        $this->renaming = true;
    }

    /**
     * Attempt to rename the model.
     *
     * @return void
     */
    public function rename()
    {
        $this->model->rename(
            $this->model->getCreatableRdn(
                data_get($this->form, 'name')
            )
        );

        $this->renaming = false;

        $this->flash('success', 'Successfully renamed object');

        $this->emit('model.changed', $this->model->getConvertedGuid());
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.rename');
    }
}
