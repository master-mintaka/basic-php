<?php
use Core\Response;

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
        require base_path($routes[$uri['path']]);
    }else{
        abort();
    }
}

function abort($http_status_code = Response::HTTP_NOT_FOUND): never
{
    http_response_code($http_status_code);
    require base_path("views/{$http_status_code}.php");
    die();
}

function authorize($condition, $http_status_code = Response::HTTP_FORBIDDEN): void
{
    if (!$condition) {
        abort($http_status_code);
    }
}

function base_path($path = ''): string
{
    return BASE_PATH . $path;
}

function view($path, $data = []): void
{   
    extract($data);
    require base_path(path: 'views/' . $path);
}