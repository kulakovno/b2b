<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20.02.2017
 * Time: 12:02
 */

namespace b2b\Mappers;


use b2b\Entities\UserInterface;

interface UserMapperInterface
{
    /**
     * @param UserInterface $user
     * @return bool
     */
    public function save(UserInterface $user) : bool;

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function delete(UserInterface $user) : bool;
}