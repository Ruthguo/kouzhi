<?php
    namespace UserManageSystem\Control\UserContoller;

    use UserManageSystem\Model\UserModel\UserModel;

    header("Content-Type:text/html;charset=utf-8");
class User
{
    public function add()
    {
        require 'View/add.html';
    }
    public function addTo()
    {
        require_once 'Model/UserModel.php';
        $user = new UserModel();
        $user->addUser();
        require 'View/header.html';
    }
    public function listTo()
    {
        require_once 'Model/UserModel.php';
        $user = new UserModel();
        $users=$user->listUser();
        require 'View/list.php';
    }
    public function delTo()
    {
        require_once 'Model/UserModel.php';
        $user = new UserModel();
        $user->delUser();
    }
    public function modifyTo()
    {
        require_once 'Model/UserModel.php';
        $user = new UserModel();
        $users=$user->modifyUser();
        require 'View/modify.html';
    }
    public function modify()
    {
        require_once 'Model/UserModel.php';
        $user = new UserModel();
        $user->modifyOneUser();
        require 'View/header.html';
    }
}
