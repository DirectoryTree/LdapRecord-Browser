<?php

namespace LdapRecord\Browser\Livewire;

trait FlashesMessages
{
    /**
     * Flash a message.
     *
     * @param string $type
     * @param string $message
     *
     * @return void
     */
    public function flash($type, $message)
    {
        $this->emit('flash', $type, $message);
    }
}
