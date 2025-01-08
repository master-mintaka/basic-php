<?php
require_once "functions.php";
require_once "Database.php";
//require "router.php";

//Connect to MySQL DB
$db = new Database();
$query = "SELECT * FROM posts";
$posts = $db->query($query)->fetchAll();

dd($posts);