<?php

include __DIR__ . '/begin.php';

$id = $_GET['id'];

$img = new my\ImageUploader($db);

$img->delete($id);

header('Location: /edit?id=' . $id);