<?php
use Core\Response;  
use Core\App;
use Core\Database;

$db = App::container()->resolve(Database::class);

$currentUserId = 1;
$note = $db->query("SELECT * FROM notes where id = :id and user_id = :user_id", [
    'id' => (int)$_POST['id'],
    'user_id' => $currentUserId
])->findOrFail();

authorize($note['user_id'] === $currentUserId, Response::HTTP_FORBIDDEN);

$db->query("DELETE FROM notes where id = :id", [
    'id' => (int)$_POST['id']
]);

$db->close();

header("Location: /notes"); //Asi se enruta a un controlador, se utiliza la ruta definida en routes.php