<?php
$router->get("/", "controllers/index.php");
$router->get("/about", "controllers/about.php");
$router->get("/contact", "controllers/contact.php");

//Notes controllers
$router->get("/notes", "controllers/notes/index.php");

//Create
$router->get("/notes/create", "controllers/notes/create.php"); //Muestra el formulario para crear una nueva nota
$router->post("/notes", "controllers/notes/store.php");
//Read
$router->get("/note", "controllers/notes/show.php");
//Update
$router->get("/notes/edit", "controllers/notes/edit.php"); //Muestra el formulario para editar una nota
$router->patch("/note", "controllers/notes/update.php"); //Actualiza una nota
//Delete
$router->delete("/note", "controllers/notes/destroy.php");

$router->get("/register", "controllers/registration/create.php");
$router->post("/register", "controllers/registration/store.php");


