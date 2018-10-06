<?php

include __DIR__ . '/begin.php';

$posts = $db->getAll('posts');

$smarty->assign('posts', $posts);
$smarty->display('home.tpl');