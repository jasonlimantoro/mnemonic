<?php


namespace App\Presenters;


abstract class BasePresenter
{
    /**
     * @var mixed
     */
    protected $entity;

    /**
     * @param $entity
     */
    function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * Allow for property-style retrieval
     *
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        if (method_exists($this, $property))
        {
            return $this->{$property}();
        }

        return $this->entity->{$property};
    }

    /**
     * Resolve when invoked inaccessible method
     *
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        if (method_exists($this, $method))
        {
            return $this->{$method}($arguments);
        }

        return $this->entity->{$method}($arguments);
	}
}