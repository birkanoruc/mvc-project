<?php

    use Core\Validator;
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

    /** Validation */
    $errors = [];
    if(! Validator::string($_POST["body"],1,1000)){
        $errors["body"] = "A body of no more than 1.000 characters is required.";
    }

    /** Is Errors */
    if(! empty($errors)){
        return view("notes/edit.view.php",[
            "heading" => "Edit a Note",
            "errors" => $errors,
            "note" => $note
        ]);
    }

    /** Update */
    $db->query("UPDATE notes SET body=:body WHERE id=:id",[
        ":body" => $_POST["body"],
        ":id" => $_POST["id"],
    ]);

    /** Redirect */
    header("Location: /notes");
    die();
