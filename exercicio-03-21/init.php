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

?>