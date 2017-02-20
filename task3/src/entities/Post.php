<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 17:17
 */

namespace b2b\Entities;


class Post extends Entity implements PostInterface, EntityInterface
{
    private $id;
    private $author;
    private $text;

    /**
     * Post constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
        $this->id = random_int(1, 999);
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }


    /**
     * @return UserInterface
     */
    public function getAuthor() : UserInterface
    {
        return $this->author;
    }

    /**
     * @param UserInterface $author
     * @return PostInterface
     */
    public function setAuthor(UserInterface $author) : PostInterface
    {
        $this->author = $author;
        echo 'Post ' . $this->getId() . ' author changed to ' . $author->getName() . PHP_EOL;
        return $this;
    }

    /**
     * @param $params
     * @return PostInterface
     */
    public static function from($params): PostInterface
    {
        return new self($params['text']);
    }

    /**
     * @return array
     */
    public function asArray() : array
    {
        return [
            'id' => $this->id,
            'author' => $this->author,
            'text' => $this->text
        ];
    }

}