<?php
namespace UserManageSystem;

use \Twig_Loader_Filesystem;

use \Twig_Environment;

require 'C:\Users\Administrator\vendor\autoload.php';
$loader = new Twig_Loader_Filesystem('templetes');
$twig = new Twig_Environment($loader);
echo $twig->render('list.twig', array('users'=>$users));
