<?php
    use Core\Session;

    view("notes/create.view.php",[
        "heading" => "Create a Note",
        "errors" => Session::get("errors")
    ]);