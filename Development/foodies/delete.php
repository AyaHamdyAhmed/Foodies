<?php

require_once 'Classes/Adminclass.php';
$Admin=new Adminclass();
$userid=$_GET['ID'];
$result=$Admin->deleteUser($userid);

if($result){
    header("location:Foodies_FrontEnd_DeleteUsersPage.php");
}