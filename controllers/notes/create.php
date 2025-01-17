<?php
require 'Validator.php';   
$heading = "Create Note";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Instances
    $db = Database::getInstance(require 'config.php');
    $body = $_POST['body'];

    //VALIDATION ARRAYS
    $errors = [];
    $content = [];

    if (!Validator::isValidString($body, 1, 500)) {
        $content['body'] = $body;
        $errors['body'] = 'The body field must be less than 500 characters';
    }

    if (empty($errors)) {
        $query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";
        $db->query($query, [
            'body' => $body,
            'user_id' => 1
        ]);
        $db->close();
        header('Location: /notes');
    }
}

require 'views/notes/create.view.php';
