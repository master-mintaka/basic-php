<?php
$heading = "Create Note";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db = Database::getInstance(require 'config.php');

    //VALIDATION
    $errors = [];
    $content = [];

    if (!isset($_POST['body']) || empty($_POST['body'])) {
        $errors['body'] = 'The body field is required';
    }

    if (strlen($_POST['body']) > 500) {
        $errors['body'] = 'The body field must be less than 500 characters';
        $content['body'] = $_POST['body'];
    }

    if (empty($errors)) {
        $query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";
        $db->query($query, [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
        $db->close();
        header('Location: /notes');
    }
}

require 'views/note-create.view.php';
