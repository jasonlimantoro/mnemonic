<?php

namespace App\Traits;

use Laracasts\Presenter\Exceptions\PresenterException;

trait Presentable {

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

    public static function process()
    {
        return (new static)->present();
    }

}
