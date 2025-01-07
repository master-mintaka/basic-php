<?php

function dd($value): never
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function routeToController(array $uri, array $routes): void
{
    if (array_key_exists($uri['path'], $routes)){
        require $routes[$uri['path']];
    }else{
        abort();
    }
}

function abort($http_status_code = 404): never
{
    http_response_code($http_status_code);
    require "views/{$http_status_code}.php";
    die();
}
