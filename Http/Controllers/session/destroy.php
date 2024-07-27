<?php

use Core\Authenticator;

$auth = new Authenticator();
$auth->logout();

/** Redirect */
header("Location: /");
exit();