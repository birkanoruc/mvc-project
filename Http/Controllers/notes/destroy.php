<?php

    use Core\App;
    use Core\Database;

    $db = App::resolve(Database::class);

    /** Find */
    $note = $db->query("SELECT * FROM notes WHERE id = :id",[
        ":id" => $_POST["id"],
    ])->findOrFail();

    /** Authorize */
    $currentUserId = 1;
    authorize($note["user_id"] === $currentUserId);

    /** Delete */
    $db->query("DELETE FROM notes WHERE id = :id", [
        ":id" => $_POST["id"]
    ]);

    /** Redirect */
    header("Location: /notes");
    exit();