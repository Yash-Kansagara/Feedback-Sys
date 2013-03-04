<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$link = mysqli_connect("localhost", "root", "", "test");
if(mysqli_errno($link)){
    echo ' Some Error occured ';
    die();
}
?>
