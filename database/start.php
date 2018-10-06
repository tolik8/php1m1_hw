<?php

$config = include __DIR__ . '/../control/config.php';

$validator = new my\Validator;

return new QueryBuilder(
    Connection::make($config['database']),
    $validator
);
