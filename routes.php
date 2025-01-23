<?php
$router->get("/", "controllers/index.php");
$router->get("/about", "controllers/about.php");
$router->get("/contact", "controllers/contact.php");

//Notes controllers
$router->get("/notes", "controllers/notes/index.php");
$router->post("/notes", "controllers/notes/store.php");
$router->get("/notes/create", "controllers/notes/create.php"); //Muestra el formulario para crear una nueva nota

$router->get("/note", "controllers/notes/show.php");
$router->delete("/note", "controllers/notes/destroy.php");




