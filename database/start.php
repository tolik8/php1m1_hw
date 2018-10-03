<?php

$config = include __DIR__ . '/../control/config.php';
include 'QueryBuilder.php';
include 'Connection.php';
include __DIR__ . '/../control/Validator.php';

$validator = new Validator;

return new QueryBuilder(
    Connection::make($config['database']),
    $validator
);
