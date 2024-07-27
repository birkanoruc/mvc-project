<?php

$router->get("/", "index.php");
$router->get("/about", "about.php");
$router->get("/contact", "contact.php");

$router->get("/notes", "notes/index.php")->only("auth");
$router->get("/note", "notes/show.php")->only("auth");
$router->delete("/note", "notes/destroy.php")->only("auth");

$router->get("/note/edit", "notes/edit.php")->only("auth");
$router->patch("/note", "notes/update.php")->only("auth");

$router->get("/notes/create", "notes/create.php")->only("auth");
$router->post("/notes", "notes/store.php")->only("auth");

$router->get("/register","registration/create.php")->only("guest");
$router->post("/register","registration/store.php")->only("guest");

$router->get("/login","session/create.php")->only("guest");
$router->post("/login","session/store.php")->only("guest");
$router->delete("/logout", "session/destroy.php")->only("auth");

/** ADMIN */

$router->get("/admin/", "Admin/index.php");

/** Login Page */
$router->get("/admin/login", "Admin/session/create.php")->only("guest");
$router->post("/admin/login", "Admin/session/store.php")->only("guest");

/** Logout Action */
$router->delete("/admin/logout", "Admin/session/destroy.php");
