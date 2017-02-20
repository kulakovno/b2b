<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 17:33
 */

namespace b2b\Mappers;


use b2b\Entities\PostInterface;
use b2b\Entities\UserInterface;

class Post extends Mapper implements PostMapperInterface
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

    /**
     * @param PostInterface $post
     * @return bool
     */
    public function save(PostInterface $post) : bool
    {
        $this->adapter->add($post->getId(), $post);
        echo 'User: ' . $post->getAuthor()->getName() . '. Post ' . $post->getId() . ' Added. ' . PHP_EOL;
        return true;
    }

    /**
     * @param PostInterface $post
     * @return bool
     */
    public function delete(PostInterface $post) : bool
    {
        $this->adapter->remove($post->getId());
        echo 'User: ' . $post->getAuthor()->getName() . '. Post ' . $post->getId() . ' Removed. ' . PHP_EOL;
        return true;
    }


}