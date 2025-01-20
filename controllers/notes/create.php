<?php
require base_path('Core/Validator.php');
$heading = "";

//VALIDATION ARRAYS
$errors = [];
$content = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Instances
    $db = Database::getInstance(require base_path('config.php'));
    //$db = new Database(require base_path('config.php'));
    $body = $_POST['body'];


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

view("notes/create.view.php", [
    "heading" => "Create Note",
    "errors" => $errors,
    "content" => $content
]);
