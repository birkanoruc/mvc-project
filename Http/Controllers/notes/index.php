<?php

    use Core\App;
    use Core\Database;

    $db = App::resolve(Database::class);

    /** Find All */
    $notes = $db->query("SELECT * FROM notes WHERE user_id = 1")->get();

    /** View */
    view("notes/index.view.php",[
        "heading" => "My Notes",
        "notes" => $notes,
    ]);