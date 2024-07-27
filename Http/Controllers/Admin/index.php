<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

/** Find All */
$users = $db->query("SELECT * FROM users")->get();

/** Find All */
$user_metas = $db->query("SELECT * FROM user_metas")->get();

$userType = $db->query("SELECT 
    u.id,
    u.name,
    u.email,
    um.meta_value AS type
FROM 
    users u
LEFT JOIN 
    user_metas um ON u.id = um.user_id AND um.meta_key = 'type'
WHERE 
    u.email = :email", [
        ":email" => $_SESSION["user"]["email"]
    ])->get();





    
view("admin/dashboard.view.php",[
    "heading" => "Home",
    "users" => $users,
    "user_metas" => $user_metas,
    "userType" => $userType
]);