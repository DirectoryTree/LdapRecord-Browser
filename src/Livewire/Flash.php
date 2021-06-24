<?php

namespace LdapRecord\Browser\Livewire;

use Livewire\Component;

class Flash extends Component
{
    /**
     * The flash message type.
     *
     * @var string
     */
    public $type;

    /**
     * The flash message.
     *
     * @var string
     */
    public $message;

    /**
     * The event listeners.
     *
     * @var array
     */
    protected $listeners = ['flash' => 'display'];

    /**
     * Display the flash message.
     *
     * @param string $type
     * @param string $message
     *
     * @return void
     */
    public function display($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Dismiss the flash message.
     *
     * @return void
     */
    public function dismiss()
    {
        $this->type = null;
        $this->message = null;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('ldap::livewire.flash');
    }
}
