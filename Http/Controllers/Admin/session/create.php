<?php

use Core\Session;

view("admin/auth/login.view.php", [
    "errors" => Session::get("errors"),
]);
