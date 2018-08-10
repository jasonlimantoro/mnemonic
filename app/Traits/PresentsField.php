<?php

namespace App\Traits;

use App\Presenters\EventPresenter;
use Laracasts\Presenter\Exceptions\PresenterException;

trait PresentsField {

    /**
     * View presenter instance
     *
     * @var mixed
     */
    protected $presenterInstance;


    /**
     * Prepare a new or cached presenter instance
     *
     * @return mixed
     * @throws PresenterException
     */
    public function present()
    {
        if ( ! $this->presenter or ! class_exists($this->presenter))
        {
            throw new PresenterException('Please set the $presenter property to your presenter path.');
        }

        if ( ! $this->presenterInstance)
        {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }


    /**
     * @return EventPresenter
     */
    public static function process()
    {
        return (new static)->present();
    }

}
