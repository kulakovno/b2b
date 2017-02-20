<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20.02.2017
 * Time: 12:02
 */

namespace b2b\Mappers;


use b2b\Entities\PostInterface;
use b2b\Entities\UserInterface;

interface PostMapperInterface
{
    /**
     * @param PostInterface $post
     * @return bool
     */
    public function save(PostInterface $post) : bool;

    /**
     * @param PostInterface $post
     * @return bool
     */
    public function delete(PostInterface $post) : bool;

    /**
     * @param UserInterface $author
     * @return array
     */
    public function findByAuthor(UserInterface $author) : array;
}