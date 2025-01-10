<?php

$config = require "../config.php";


$instance1 = Database::getInstance($config);
$instance2 = Database::getInstance($config);

var_dump($instance1);
var_dump($instance2);

var_dump($instance1 === $instance2);
