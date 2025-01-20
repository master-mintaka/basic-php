<?php
$heading = "Note Detail";

$db = Database::getInstance(require base_path("config.php"));

$currentUserId = 1;
$note = $db->query("SELECT * FROM notes where id = :id and user_id = :user_id", [
    'id' => (int)$_GET['id'],
    'user_id' => $currentUserId
])->findOrFail();

$db->close();

authorize($note['user_id'] === $currentUserId, Response::HTTP_FORBIDDEN);

view("notes/show.view.php", [
    "heading" => "Note Detail",
    "note" => $note
]);
