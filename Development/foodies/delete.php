<?php
require_once 'Classes/Adminclass.php';
$Admin=new Adminclass();
$userid=$_GET['ID'];
$result=$Admin->deleteUser($userid);

if($result){
     $msg="user deleted successfully";
    header("location:Foodies_FrontEnd_DeleteUsersPage.php?msg=".$msg);

}