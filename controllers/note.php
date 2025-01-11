<?php
$heading = "Note Detail";

$db = Database::getInstance(require "config.php");

$note = $db->query("SELECT * FROM notes where id = :id", [
    'id' => (int)$_GET['id']
    ])->fetch();

    $db->close();

if (!$note) {
    abort(Response::HTTP_NOT_FOUND);
}

$currentUserId = 1;

if (!($note['user_id'] !== $currentUserId)) {
    abort(Response::HTTP_FORBIDDEN);
}

require "views/note.view.php";