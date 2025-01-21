<?php
use Core\Database;

$dbi = Database::getInstance(require base_path("config.php"));
$notes = $dbi->query("SELECT * FROM notes where user_id = 1")->getAllOrFail();
$dbi->close();

view("notes/index.view.php", [
    "heading" => "My Notes",
    "notes" => $notes
]);