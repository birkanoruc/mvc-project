<?php

namespace Core\Middleware;

use Models\User;
use Models\UserMeta;

class Admin
{
    public function handle()
    {
        // Kullanıcı oturumunu kontrol et
        if (!isset($_SESSION["user"])) {
            redirect("/");
        }

        // Kullanıcı e-posta adresini oturumdan al
        $email = $_SESSION["user"]["email"];

        // Kullanıcıyı e-posta adresine göre bul
        $user = (new User())->where('email', '=', $email)->first();

        // Kullanıcı metalarını kontrol et
        if (!$user) {
            redirect("/");
        }

        $userMeta = (new UserMeta())->where("user_id", "=", $user["id"])->where('meta_key', '=', 'type')->first();
            
        if (!$userMeta) {
            redirect("/");
        }

        $userType = $userMeta["meta_value"];

        if ($userType !== "admin"){
            redirect("/");
        }
    }
}