<?php

use Core\Database;
use Core\Validator;

//VALIDATION ARRAYS
$errors = [];
$content = [];

$db = Database::getInstance(require base_path('config.php'));
$body = $_POST['body'];

if (!Validator::isValidString($body, 1, 500)) {
    $content['body'] = $body;
    $errors['body'] = 'The body field must be less than 500 characters';
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        "heading" => "Create Note",
        "errors" => $errors,
        "content" => $content
    ]);
}

$query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";
$db->query($query, [
    'body' => $body,
    'user_id' => 1
]);
$db->close();

header('Location: /notes');