<?php

include __DIR__ . '/begin.php';

$id = $_GET['id'];

$post = $db->getOne('posts', $id);
// найти сколько раз используется это изображение
$count = $db->count('posts', ['img' => $post['img']]);

// если такое изображение больше не используется то удалить файл
if ($count == 1) {
    $image_name = IMG_PATH . $post['img'];
    if (file_exists($image_name)) {unlink($image_name);}
}

$db->delete('posts', $id);

header('Location: /');