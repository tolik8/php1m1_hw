<?php

include __DIR__ . '/begin.php';

$db->update('posts', [
    'title' => $_POST['title']
], $_POST['id']);

header('Location: /');