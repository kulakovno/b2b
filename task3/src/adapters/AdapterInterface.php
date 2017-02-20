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
     * @return array
     */
    public function find($id) : array;

    /**
     * @param array $conditions
     * @return array
     */
    public function findAll(array $conditions): array;

    /**
     * @param $name
     * @param $data
     * @return bool
     */
    public function add($name, $data) : bool;

    /**
     * @param $name
     * @return bool
     */
    public function remove($name) : bool;
}