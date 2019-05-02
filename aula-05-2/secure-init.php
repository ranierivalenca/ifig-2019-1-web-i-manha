<?php

include 'init.php';

if (!isLogged()) {
    redirect('index.php');
}

?>