<?php

include __DIR__ . '/const.php';
include __DIR__ . '/functions.php';
$db = include __DIR__ . '/../database/start.php';
include __DIR__ . '/ImageUploader.php';

$id = $_GET['id'];

$img = new ImageUploader($db);

$img->delete($id);

header('Location: /edit?id=' . $id);