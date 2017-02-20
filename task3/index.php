<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 17:10
 */
require_once __DIR__ . '/autoload.php';

$user = \b2b\Entities\User::from([
    'name' => 'kulakov'
]);

$dummy = \b2b\Entities\User::from([
    'name' => 'dummy'
]);

$post1 = \b2b\Entities\Post::from([
    'text' => '123'
]);

$post2 = \b2b\Entities\Post::from([
    'text' => '456'
]);
$storage = new \b2b\Adapters\Storage([]);
$postMapper = new \b2b\Mappers\Post($storage);
$userMapper = new \b2b\Mappers\User($storage);
//Каждый из пользователей написал пост
$post1->setAuthor($user);
$post2->setAuthor($dummy);
$postMapper->save($post1);
$postMapper->save($post2);
//Смена автора у поста
$post1->setAuthor($dummy);
$postMapper->save($post1);

//Поиск по постам пользователя
$foundPosts = $postMapper->findByAuthor($dummy);

echo 'User: ' . $dummy->getName() . ' Posts.' . PHP_EOL;
foreach ($foundPosts as $foundPost) {
    echo $foundPost->getId() . ' ';
}