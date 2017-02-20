<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 18:01
 */

namespace b2b\Entities;


interface EntityInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public static function from($params);

    /**
     * @return array
     */
    public function asArray() : array;
}