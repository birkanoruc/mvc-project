<?php

use Core\Authenticator;

$auth = new Authenticator();
$auth->logout();

header("Location: /admin/login");
exit();
