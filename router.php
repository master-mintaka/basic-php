<?php

$query_params = $uri["query"] ?? '';

$routes = require "routes.php";

$uri = parse_url($_SERVER['REQUEST_URI']);
routeToController($uri, $routes);