<?php
session_start();
$id=$_GET['ID'];
$_SESSION['restID']=$id;
header("location:Foodies_FrontEnd_ViewMenu.php");
