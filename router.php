<?php

$uri = parse_url($_SERVER['REQUEST_URI']);
$query_params = $uri["query"] ?? '';

$routes = [
    "/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/contact.php"
];

routeToController($uri, $routes);