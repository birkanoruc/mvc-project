<?php

    use Core\App;
    use Core\Database;

    $db = App::resolve(Database::class);

    /** Find */
    $note = $db->query("SELECT * FROM notes WHERE id = :id",[
        ":id" => $_GET["id"],
    ])->findOrFail();

    /** Authorize */
    $currentUserId = 1;
    authorize($note["user_id"] === $currentUserId);

    /** View */
    view("notes/show.view.php",[
        "heading" => "Note",
        "note" => $note
    ]);

