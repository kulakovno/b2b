<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 22:04
 */

namespace b2b\Entities;


use b2b\Exceptions\UnknownPropertyException;

abstract class Entity implements EntityInterface
{
    /**
     * @param $name
     * @return mixed
     * @throws UnknownPropertyException
     */
    public function __get($name)
    {
        $getter = 'get' . $name;

        if (method_exists($this, $getter)) {
            return $this->$getter();
        }

        throw new UnknownPropertyException('Getting unknown property: ' . get_class($this) . '::' . $name);
    }

}