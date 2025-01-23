<?php
//Playground class to test the container

use Core\Container;
use Core\Database;
use Core\App;

$container = new Container();

$container->bind('Core\Database', function () {
    return Database::getInstance(require base_path("config.php"));
});

$db = $container->resolve('Core\Database');

App::setContainer($container);
