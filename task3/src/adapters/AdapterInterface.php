<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 17:34
 */

namespace b2b\Adapters;


interface AdapterInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param array $conditions
     * @return mixed
     */
    public function findAll(array $conditions);
}