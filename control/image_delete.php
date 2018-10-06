<?php

include __DIR__ . '/begin.php';

$id = $_GET['id'];

$img = new ImageUploader($db);

$img->delete($id);

header('Location: /edit?id=' . $id);