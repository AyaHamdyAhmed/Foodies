<?php
require_once 'db_connection.php';
class PersonClass{
    
    public $id ;
    public $userId;
    public $email;
    public $password;
    public $idUserType;
    public $message="";
     
      public function login($userId,$password) {
        session_start();
        db_connection::startConnection();
        $query = "select * from person where userId='$userId' and password='$password';";
        $result = mysqli_query(db_connection::$con, $query);
        if ($result) { 
            if (mysqli_num_rows($result) > 0) {
                while ($row=mysqli_fetch_assoc($result)) {
                    $this->message="3"; 
                    $_SESSION['ID'] = $row['id'];
                    $_SESSION['UserID'] = $row['userId'];
                    $_SESSION['Password'] = $row['password'];
                    $_SESSION['IdUserType']=$row['idUserType'];
                }
          if($_SESSION['IdUserType'] == '1'){
          header("location:adminHome.php");
          }
           else if($_SESSION['IdUserType'] == '2'){
          header("location:Home.php");
         } 
            } else {
         $this->message="Invalid username or password";    
         }          
        }  
    }
          

}
