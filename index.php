<?php
require_once "functions.php";
//require "router.php";

//Connect to MySQL DB
$dsn = "mysql:host=localhost;port=3306;dbname=demo_php;charset=utf8mb4";
$db_user = "root";
$db_pwd = "WsxOkn1732.*";

//New PDO instance
$pdo = new PDO($dsn, $db_user, $db_pwd);
//Prepare an statement
$statement = $pdo->prepare("SELECT * FROM posts");
//Execute the statement
$statement->execute();
//Fetch results as an associative array, there are many other ways to fetch the result
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

dd($posts);