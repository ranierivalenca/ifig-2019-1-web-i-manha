<?php

session_start();

/* Constantes */
define('TITLE', 'Sistema de Doação');
define('SEPARATOR', '***');
define('ITEMS_FILE', 'items.csv');
define('USERS_FILE', 'users.csv');

/* Funções */

function explode_by_separador($str) {
    return explode(SEPARATOR, $str);
}

function addRegister($dataArr, $file) {
    $handle = fopen($file, 'a');
    $data = implode(SEPARATOR, $dataArr) . "\n";
    fwrite($handle, $data);
}

function login($email, $pw) {
    $file = file(USERS_FILE);
    $users_pw = array_map(function($el) {
        $parts = explode(SEPARATOR, $el);
        return implode(SEPARATOR, [$parts[0], $parts[1]]);
    }, $file);

    if(!in_array(implode(SEPARATOR, [$email, md5($pw)]), $users_pw)) {
        return false;
    }

    $_SESSION['logged'] = true;
    $_SESSION['email'] = $email;
    return true;
}

function user_info($_email) {
    $file = file(USERS_FILE);
    $user = false;
    foreach($file as $userData) {
        $userData = explode(SEPARATOR, $userData);
        list($email, , $name, $phone, $city, $district) = $userData;
        if ($_email != $email) {
            continue;
        }

        $user = [
            'email' => $email,
            'nome' => $name,
            'fone' => $phone,
            'cidade' => $city,
            'bairro' => $district
        ];
    }
    return $user;
}

function email_exists($_email) {
    $file = file(USERS_FILE);
    foreach($file as $userData) {
        list($email) = explode(SEPARATOR, $userData);
        if ($_email == $email) {
            return true;
        }
    }
    return false;
}

function is_logged() {
    return $_SESSION['logged'] ?? false;
}

function user_email() {
    return $_SESSION['email'] ?? false;
}

function logout() {
    session_destroy();
}

function redirect($url) {
    header('location: ' . $url);
    exit();
}

function item_info($str) {
    $parts = explode(SEPARATOR, $str);
    list($userEmail, $title, $desc) = $parts;
    return [
        'email' => $userEmail,
        'titulo' => $title,
        'desc' => $desc
    ];
}

function getItems() {
    if (!is_file(ITEMS_FILE)) {
        return [];
    }
    $items = file(ITEMS_FILE);
    $items = array_filter($items, function($el) {
        return trim($el) != '';
    });
    $items = array_map('item_info', $items);
    return $items;
}

?>