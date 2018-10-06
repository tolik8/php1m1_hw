<?php

include __DIR__ . '/begin.php';

$id = $_GET['id'];

$img = new ImageUploader($db);

if (isset($_FILES['image'])) {
    if (is_array($_FILES['image'])) {
        $img->upload($_FILES['image'], $id);
    }
}

header('Location: /edit?id=' . $id);