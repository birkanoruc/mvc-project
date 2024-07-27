<?php

    use Core\App;
    use Core\Database;
    use Http\Forms\CreateNoteForm;

    $form = CreateNoteForm::validate($attributes = [
        "body" => $_POST["body"]
    ]);

    $insert = App::resolve(Database::class)->query("INSERT INTO notes(body, user_id) VALUES(:body,:user_id)",[
    ":body" => $_POST["body"],
    ":user_id" => 1,
    ]);

    if(! $insert) {
        $form->error(
            "insert", "An error was encountered while processing the transaction."
        )->throw();
    }

    /** Redirect */
    header("Location: /notes");
    die();
