<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        /** Find */
        $user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email",[
            "email" => $email,
        ])->find();

        /** Check If The Account Already Exist */
        if($user){
            if(password_verify($password,$user["password"])){
                $this->login($user);
                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION["user"] = [
            "name" => $user["name"],
            "email" => $user["email"]
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}