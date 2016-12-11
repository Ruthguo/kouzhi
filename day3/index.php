<?php
namespace UserManageSystem;

use UserManageSystem\Control\UserContoller\User as User;

if ($_GET) {
    require 'Control/UserController.php';
    $control = new User();
    $method = @$_GET['method'] ? $_GET['method'] : 'add';
    $control->$method();
}
