<?php

namespace gocrew\LaravelPresenter;

trait Presentable
{
    /**
     * @var mixed
     */
    protected $presenterInstance;

    /**
     * Present a property of this entity.
     *
     * @throws PresenterException
     *
     * @return mixed
     */
    public function present()
    {
        if (!$this->presenter or !class_exists($this->presenter)) {
            throw new PresenterException('$presenter property to your presenter is missing in '.get_class($this).'.');
        }

        if (!$this->presenterInstance) {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }
}
