<?php

namespace Core\Middleware;
class UserType
{
    public function handle()
    {
        if(! $_SESSION["user"] ?? false){
            header("Location: /");
            exit();
        }
    }
}