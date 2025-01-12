<?php
$heading = "Note Detail";

$db = Database::getInstance(require "config.php");

$currentUserId = 1;
$note = $db->query("SELECT * FROM notes where id = :id and user_id = :user_id", [
    'id' => (int)$_GET['id'],
    'user_id' => $currentUserId
])->findOrFail();

$db->close();

authorize($note['user_id'] === $currentUserId, Response::HTTP_FORBIDDEN);

require "views/note.view.php";
