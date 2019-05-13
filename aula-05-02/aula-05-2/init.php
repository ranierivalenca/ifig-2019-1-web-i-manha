<?php

session_start();

function addUser($nome, $username, $email, $senha, $telefone, $estado, $pais) {
    $str = implode(',', [$nome, $username, $email, $senha, $telefone, $estado, $pais]);
    // $handle = fopen('users.csv', 'a');
    // fwrite($handle, $str . "\n");
    // fclose($handle);
    file_put_contents('users.csv', $str . "\n", FILE_APPEND);
}

function addProduct($nome, $url, $tipo, $descricao) {
    $descricao = str_replace("\n", "<br>", $descricao);
    $descricao = str_replace("\r", "", $descricao);
    $str = implode('|||', [userId(), $nome, $url, $tipo, $descricao]);
    file_put_contents('products.csv', $str . "\n", FILE_APPEND);
}

function getProducts() {
    $products = file('products.csv');
    $products = array_map(
        function($el) {
            return explode('|||', $el);
        }, $products
    );
    return $products;
}

function getUser($id) {
    $users = file('users.csv');
    $user = $users[$id];
    return explode(',', $user);
}

function login($user, $senha) {
    $users = file('users.csv');
    $users = array_map(
        function($el) {
            return explode(',', $el);
        }, $users
    );
    foreach($users as $id => $userData) {
        if (($userData[1] == $user && $userData[3] == $senha) || ($userData[2] == $user && $userData[3] == $senha)) {
            $_SESSION['logado'] = true;
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $userData[0];
            return true;
        }
    }
    return false;
}

function logout() {
    session_destroy();
}

function isLogged() {
    return $_SESSION['logado'] ?? false;
}

function userId() {
    return $_SESSION['user_id'] ?? false;
}

function userName() {
    return $_SESSION['user_name'] ?? false;
}

function redirect($url) {
    header('location: ' . $url);
    exit();
}

?>