<?php

include __DIR__ . '/begin.php';

$db->create('posts', [
    'title' => $_POST['title']
]);

header('Location: /');