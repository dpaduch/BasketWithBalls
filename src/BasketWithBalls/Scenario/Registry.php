<?php

namespace BasketWithBalls\Scenario;

/**
 * Scenario Registry Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
class Registry
{
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return isset($this->data[$name])
            ? $this->data[$name]
            : null
        ;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}
