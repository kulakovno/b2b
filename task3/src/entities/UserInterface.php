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
     * @return string
     */
    public function getName() : string;
}