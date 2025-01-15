<?php
$heading = "New Note";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*
    $db = Database::getInstance(require 'config.php');
    $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
    $db->close();
    header('Location: /notes');
    */
}


require 'views/note-create.view.php';