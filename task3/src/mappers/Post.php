<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 17:33
 */

namespace b2b\Mappers;


use b2b\Entities\UserInterface;

class Post extends Mapper
{
    /**
     * @param UserInterface $author
     * @return array
     */
    public function findByAuthor(UserInterface $author) : array
    {
        $found = $this->adapter->findAll(compact('author'));

        return $found;
    }
}