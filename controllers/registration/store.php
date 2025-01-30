<?php
use Core\Database;
use Core\Validator;
use Core\App;  

//VALIDATION ARRAYS
$errors = [];

$email = $_POST['email'];
$password = $_POST['password'];

if (!Validator::isValidEmail($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::isValidString($password, 7, 50)) {
    $errors['email'] = 'Password must be between 7 and 50 characters';
}

if (!empty($errors)) {
    return view("registration/create.view.php", [
        "heading" => "User Registration",
        "errors" => $errors
    ]);
}

$db = App::container()->resolve(Database::class);

//validate if email already exists
$cant_users = $db->query("SELECT * FROM users WHERE email = :email", 
['email' => $email])->statement->rowCount();

if ($cant_users > 0) {
    header("location: /");
    die();
}

$query = "INSERT INTO users (email, password) VALUES (:email, :password)";
$db->query($query, [
    'email' => $email,
    'password' => $password
]);

$db->close();

$_SESSION['user'] = [
    "email" => $email,
    "password" => $password
];

header('Location: /');