<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 17:20
 */

namespace b2b\Entities;


interface PostInterface
{
    /**
     * @return int
     */
    public function getId() : int;

    /**
     * @return UserInterface
     */
    public function getAuthor() : UserInterface;

    /**
     * @param UserInterface $author
     * @return mixed
     */
    public function setAuthor(UserInterface $author);

    /**
     * @param UserInterface $author
     * @return mixed
     */
    public function changeAuthor(UserInterface $author);

}