<?php

session_start();
include __DIR__ . '/functions.php';
$db = include __DIR__ . '/../database/start.php';
include __DIR__ . '/smarty.php';

$create_data = [];

if (count($_POST) > 0) {
    
    $validator->validate($_POST, [
        'login' => 'required|login',
        'email' => 'required|email',
        'number' => 'only_digits',
    ]);

    // Валидация успешная, можна вставлять данные в базу
    if ($validator->validated) {

        $db->create('test', [
            'login' => $_POST['login'],
            'email' => $_POST['email'],
            'num' => $_POST['number'],
        ]);
    
    } else {
        
        foreach ($_POST as $key => $value) {
            $create_data[$key] = htmlspecialchars($value);
        }
    }
}

$smarty->assign('validate_errors', $_SESSION['validate_errors']);
$smarty->assign('create_data', $create_data);
$smarty->display('form.tpl');