<?php

    use Core\Validator;
    use Core\App;
    use Core\Database;
    use Core\Authenticator;

    $db = App::resolve(Database::class);

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    /** Validation */
    $errors = [];
    if(! Validator::string($name,1,255)){
        $errors["name"] = "A name of no more than 255 characters is required.";
    }
    if(! Validator::email($email)){
        $errors["email"] = "Please provide a valid email address.";
    }
    if(! Validator::string($password,7,255)){
        $errors["password"] = "Please provide a password of at least 7 characters.";
    }

    /** Is Error */
    if(! empty($errors)){
        return view("registration/create.view.php",[
            "errors" => $errors,
        ]);
    }

    /** Find */
    $user = $db->query("SELECT * FROM users WHERE email = :email",[
        "email" => $email,
    ])->find();

    /** Check If The Account Already Exist */
    if(! $user){

        /** Insert */
        $db->query("INSERT INTO users(name, email, password, admin) VALUES(:name, :email, :password, :admin)",[
            ":name" => $name,
            ":email" => $email,
            ":password" => password_hash($password, PASSWORD_BCRYPT),
            ":admin" => 0
        ]);

        /** Login */
        (new Authenticator)->login([
            "name" => $name,
            "email" => $email
        ]);

        /** Redirect */
        header("Location: /");
        exit();

    }

    return view("registration/create.view.php",[
        "errors" => [
            "registration" => "Email address is used.",
        ]
    ]);