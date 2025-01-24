<?php

use Core\Database;
use Core\Validator;
use Core\App;  

$db = App::container()->resolve(Database::class);

// find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize that the current user can edit the note
$currentUserId = 1;
authorize($note['user_id'] === $currentUserId);

//VALIDATION ARRAYS
$errors = [];
$content = [];

$body = $_POST['body'];

if (!Validator::isValidString($body, 1, 500)) {
    $content['body'] = $note['body'];
    $errors['body'] = 'The body field must be less than 500 characters';
}

if (!empty($errors)) {
    return view("notes/edit.view.php", [
        "heading" => "Edit Note",
        "errors" => $errors,
        "content" => $note
    ]);
}

$query = "UPDATE notes set body = :body where id = :id";
$db->query($query, [
    'body' => $body,
    'id' => $_POST['id']
]);
$db->close();

header('Location: /notes');