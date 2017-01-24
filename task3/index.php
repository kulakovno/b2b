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

$user->addPost($post1);
$user->addPost($post2);

$post2->changeAuthor($dummy);
$storage = new \b2b\Adapters\Storage([
    $post1->getId() => $post1,
    $post2->getId() => $post2
]);

$mapper = new \b2b\Mappers\Post($storage);
$foundPosts = $mapper->findByAuthor($user);

echo 'User: ' . $user->getName() . ' Posts.' . PHP_EOL;
foreach ($foundPosts as $foundPost) {
    echo $foundPost->getId() . ' ';
}