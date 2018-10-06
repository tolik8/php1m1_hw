<?php

include __DIR__ . '/begin.php';

$id = $_GET['id'];

$post = $db->getOne('posts', $id);

if ($post['img'] == NULL) {
    $image_name = '';
} else {
    $image_name = IMG_PATH . $post['img'];
    if (!file_exists($image_name)) {$image_name = '';}
}

$smarty->assign('post', $post);
$smarty->assign('image_name', $image_name);
$smarty->display('edit.tpl');