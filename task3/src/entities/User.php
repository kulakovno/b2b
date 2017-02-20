<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 17:17
 */

namespace b2b\Entities;


class User extends Entity implements UserInterface, EntityInterface
{
    private $id;
    private $posts = [];
    private $name;

    /**
     * User constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() : string 
    {
        return $this->name;
    }

    /**
     * @param $params
     * @return User
     */
    public static function from($params): User
    {
        return new self($params['name']);
    }

    /**
     * @return array
     */
    public function asArray(): array
    {
        return [
            'id' => $this->id,
            'posts' => $this->posts,
            'name' => $this->name
        ];
    }
}