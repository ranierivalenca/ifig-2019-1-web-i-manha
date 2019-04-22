<?php

session_start();

function login($username, $senha) {
    $data = [];
    if (file_exists('users.csv')) {
        $data = file('users.csv');
    }
    $data = array_map(function($el) {
        $parts = explode(',', $el);
        list($user, $pw) = $parts;
        return join(',', [$user, $pw]);
    }, $data);
    if (in_array(join(',', [$username, $senha]), $data)) {
        $_SESSION['logged'] = true;
        $_SESSION['username'] = $username;
        return true;
    }
    return false;
}

function logout() {
    session_destroy();
}

function isLogged() {
    return $_SESSION['logged'] ?? false;
}

function currentUser() {
    return $_SESSION['username'] ?? false;
}

function redirect($url = 'index.php') {
    header('location: ' . $url);
    exit();
}

?>