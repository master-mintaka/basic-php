<?php
$heading = "My Notes";

$dbi = Database::getInstance(require "config.php");
$notes = $dbi->query("SELECT * FROM notes where user_id = 1")->fetchAll();
$dbi->close();

require "views/notes.view.php";