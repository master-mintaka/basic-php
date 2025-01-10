<?php
$heading = "Note Detail";

$dbi = Database::getInstance(require "config.php");
$note = $dbi->query("SELECT * FROM notes where id = :id", ['id' => (int)$_GET['id']])->fetch();
$dbi->close();

require "views/note.view.php";