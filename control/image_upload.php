<?php

include __DIR__ . '/const.php';
include __DIR__ . '/functions.php';
$db = include __DIR__ . '/../database/start.php';
include __DIR__ . '/ImageUploader.php';

$id = $_GET['id'];

$img = new ImageUploader($db);

if (isset($_FILES['image'])) {
    if (is_array($_FILES['image'])) {
        $img->upload($_FILES['image'], $id);
    }
}

header('Location: /edit?id=' . $id);