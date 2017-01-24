<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 17:34
 */

namespace b2b\Mappers;


use b2b\Entities\EntityInterface;

interface MapperInterface
{
    /**
     * @param $id
     * @return EntityInterface
     */
    public function findById($id) : EntityInterface;
}