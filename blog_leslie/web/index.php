<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';



$a = new Manager\Application;
$a -> run();
