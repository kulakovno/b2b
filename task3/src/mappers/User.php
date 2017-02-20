<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 17:33
 */

namespace b2b\Mappers;


use b2b\Entities\UserInterface;

class User extends Mapper implements UserMapperInterface
{
    /**
     * @param UserInterface $user
     * @return bool
     */
    public function save(UserInterface $user) : bool
    {
        $this->adapter->add($user->getName(), $user);
        echo 'User: ' . $user->getName() . ' added. ' . PHP_EOL;
        return true;
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function delete(UserInterface $user) : bool
    {
        $this->adapter->remove($user->getName());
        echo 'User: ' . $user->getName() . ' removed. ' . PHP_EOL;
        return true;
    }


}