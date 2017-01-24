<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 17:20
 */

namespace b2b\Entities;


interface UserInterface
{
    /**
     * @param PostInterface $post
     * @return mixed
     */
    public function addPost(PostInterface $post);

    /**
     * @param PostInterface $post
     * @return mixed
     */
    public function removePost(PostInterface $post);

    /**
     * @return mixed
     */
    public function getName();
}