<?php

if (isset($_POST['firstName']) && isset($_POST['lastName'])) {

    $str = 'fn : ' . $_POST['firstName'] . '; ln : ' . $_POST['lastName'];
    echo $str;

}