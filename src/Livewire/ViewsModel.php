<?php

namespace LdapRecord\Browser\Livewire;

use LdapRecord\Browser\Browser;
use LdapRecord\Browser\ModelType;

trait ViewsModel
{
    /**
     * The currently viewing model's guid.
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

    /**
     * Clear the guid when a model has been changed.
     *
     * @param string $guid
     *
     * @return void
     */
    public function changed($guid)
    {
        if ($this->guid === $guid) {
            $this->render();
        }
    }

    /**
     * Clear the guid when a model has been deleted.
     *
     * @param string $guid
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

    /**
     * Get the sorted model's attributes.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAttributesProperty()
    {
        return collect($this->model->attributesToArray())->sortBy(function ($value, $attribute) {
            return $attribute;
        });
    }
}
