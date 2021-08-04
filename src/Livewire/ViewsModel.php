<?php

namespace LdapRecord\Browser\Livewire;

use LdapRecord\Browser\Browser;
use LdapRecord\Browser\ModelType;

trait ViewsModel
{
    /**
     * The models guid.
     *
     * @var string|null
     */
    public $guid;

    /**
     * Get the component event listeners.
     *
     * @return array
     */
    protected function getListeners()
    {
        return array_merge($this->listeners, [
            'model.changed' => 'changed',
            'model.deleted' => 'deleted'
        ]);
    }

    public function changed($guid)
    {
        if ($this->guid === $guid) {
            $this->render();
        }
    }

    /**
     * Clear the guid when a model has been deleted.
     *
     * @return void
     */
    public function deleted($guid)
    {
        if ($this->guid === $guid) {
            $this->guid = null;
        }
    }

    /**
     * Get the currently viewing model.
     *
     * @return \LdapRecord\Models\Model
     */
    public function getModelProperty()
    {
        return Browser::model()->findByGuidOrFail($this->guid);
    }

    /**
     * Resolve the viewing models type.
     *
     * @return string|null
     */
    public function getTypeProperty()
    {
        return ModelType::resolve($this->model);
    }

    /**
     * Get the name of the model.
     *
     * @return string
     */
    public function getNameProperty()
    {
        return $this->model->getName();
    }
}
