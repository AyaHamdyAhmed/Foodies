<?php
require_once 'Classes/db_connection.php';
class PersonClass {

    public $id;
    public $userId;
    public $email;
    public $password;
    public $idUserType;
    public $message = "";

    public function login($userId, $password) {
        db_connection::startConnection();
        session_start();
        $query = "select * from person where userId='$userId' and password='$password';";
        $result = mysqli_query(db_connection::$con, $query);
        /* @var $result type */
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row =mysqli_fetch_assoc($result)) {
                    $_SESSION['ID'] = $row['id'];
                    $_SESSION['UserID'] = $row['userId'];
                    $_SESSION['Email']=$row['email'];
                    $_SESSION['Password'] = $row['password'];
                    $_SESSION['IdUserType'] = $row['idUserType'];
                }
                if ($_SESSION['IdUserType'] == '1') {
                    header("location:Foodies_FrontEnd_AdminProfile.php");
                    ob_enf_fluch();
                } else if ($_SESSION['IdUserType'] == '2') {
                    header("location:Foodies_FrontEnd_Homepage.php");
                    ob_enf_fluch();
                }
            } else {
                $this->message = "Invalid username or password";
            }
        }
    }

    public function logout() {
            session_destroy();
            header("location:Foodies_FrontEnd_LoginPage.php");
            ob_enf_fluch();
    }

}
