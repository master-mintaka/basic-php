<?php
const BASE_PATH = __DIR__ . "/../";

require_once BASE_PATH . "Core/functions.php";

//require_once base_path("Database.php");
//require_once base_path("Response.php");
//Se omiten las anteriores lineas para habilitar el spl_autolioad_register, lazy load de clases en php, no es necesario que se haga el require de las clases

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    require base_path("{$class}.php");
});

require_once base_path("Core/router.php");
