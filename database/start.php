<?php

$config = include __DIR__ . '/../control/config.php';

$validator = new Validator;

return new QueryBuilder(
    Connection::make($config['database']),
    $validator
);
