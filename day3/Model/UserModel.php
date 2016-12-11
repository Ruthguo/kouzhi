<?php
    namespace UserManageSystem\Model\UserModel;

    use UserManageSystem\Control\UserContoller\User;

    use \PDO;

class UserModel
{
    public $link;
    //连接数据库
    public function __construct()
    {
        $this->link = new PDO('mysql:host=localhost;dbname=user_manage_system', 'root', '');
        if (!$this->link) {
            die("连接失败！".mysql_errno());

            return ;
        }
    }
    //增加用户
    public function addUser()
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $info = $_POST['info'];
        //$userList=$_POST;
        //var_dump($userList);
        $pre = $this->link->prepare("INSERT INTO user values (null, '$name', '$sex', '$age', '$info')");
        $pre->execute();
        return;
    }
    //查看用户
    public function listUser()
    {

        $stmt = $this->link->prepare("SELECT * FROM user");
        $stmt->execute();
        $cols = $stmt->columnCount();
        $fileList=array();
        $userList=array();
        for ($i=0; $i<$cols; $i++) {
            $col = $stmt->getColumnMeta($i);
            $fileList[]=$col['name'];
        }
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetchAll()) {
            foreach ($row as $value) {
                $userList[]=$value;
            }
        }

        return array($fileList, $userList);
    }
    //删除用户
    public function delUser()
    {
        $id = $_GET['id'];
        $stmt = $this->link->exec("DELETE FROM user WHERE id='$id'");
        require 'View/header.html';
    }
    //修改展示
    public function modifyUser()
    {
        $id = $_GET['id'];
        $stmt = $this->link->prepare("SELECT * FROM user WHERE id='$id'");
        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }
    //修改用户
    public function modifyOneUser()
    {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $info = $_POST['info'];
        $stmt = $this->link->exec("UPDATE user SET name='$name', sex='$sex', age='$age',
             info='$info' WHERE id='$id'");

        return;
    }
}
