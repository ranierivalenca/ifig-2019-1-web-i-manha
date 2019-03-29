<?php

session_start();

function get($idx) {
    if (isset($_GET[$idx])) {
        return $_GET[$idx];
    }
    return false;
}

function post($idx) {
    if (isset($_POST[$idx])) {
        return $_POST[$idx];
    }
    return false;
}

function juntar($arr) {
    $s = '';
    foreach($arr as $i => $el) {
        if ($i == sizeof($arr) - 1) {
            $s = $s . $el;
        } else {
            $s = $s . $el . ',';
        }
    }
    return $s;
}

function is_logged() {
    return isset($_SESSION['user']);
}

function login($name, $email) {
    $_SESSION['user'] = $name;
    $_SESSION['email'] = $email;
}

function logout() {
    unset($_SESSION['user']);
}

function currentUser() {
    if (!is_logged()) {
        return false;
    }
    return $_SESSION['user'];
}

function currentUserEmail() {
    if (!is_logged()) {
        return false;
    }
    return $_SESSION['email'];
}

?>