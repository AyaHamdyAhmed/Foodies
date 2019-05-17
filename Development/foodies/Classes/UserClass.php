<?php

require_once 'Classes/db_connection.php';
require_once 'Classes/PersonClass.php';

class UserClass extends PersonClass {

    public $location;
    public $gender;
    public $points;
    public $ordes;

    public function signUp($newUser) {
        db_connection::startConnection();
        $query = "select * from `person` where userId='$newUser->userId';";
        $result = mysqli_query(db_connection::$con, $query);
        $newUser->message = "hi";
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $newUser->message = "This userId already exist";
            } else {

                $sql1 = "insert into `person` (userId,email,password,idUserType) "
                        . "values('$newUser->userId','$newUser->email','$newUser->password',2)";
                $result1 = mysqli_query(db_connection::$con, $sql1);
                if ($result1) {
                    $sql2 = "select id from `person` where userId='$newUser->userId';";
                    $result2 = mysqli_query(db_connection::$con, $sql2);
                    if ($result2) {
                        if (mysqli_num_rows($result2) > 0) {
                            $newUser->message = "3";
                            while ($row = mysqli_fetch_assoc($result2)) {
                                $_SESSION['ID'] = $row['id'];
                                $_SESSION['UserID'] = $row['userId'];
                                $_SESSION['Email'] = $row['email'];
                                $_SESSION['Password'] = $row['password'];
                                $_SESSION['IdUserType'] = $row['idUserType'];
                                $id = $row['id'];
                            }
                        }
                    }
                    $sql3 = "insert into users (personID,location,gender,numOfPoints,numOfOrders) "
                            . "values('$id','$newUser->location','$newUser->gender',0,0)";
                    $result3 = mysqli_query(db_connection::$con, $sql3);
                    if ($result3) {
                        header("location:Foodies_FrontEnd_Homepage.php");
                        ob_enf_fluch();
                    }
                }
            }
        }
    }

    public function getLocation($id) {
        db_connection::startConnection();
        $sql = "SELECT location FROM users where personID='$id';";
        $result = mysqli_query(db_connection::$con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['Location'] = $row['location'];
                }
            }
        }
        return $_SESSION['Location'];
    }

    public function showRestaurants($location) {
        db_connection::startConnection();
        $sql = "SELECT * FROM `restaurant` where location='$location' and promotion IS NULL ORDER BY name LIMIT 5;";
        $result = mysqli_query(db_connection::$con, $sql);
        return $result;
    }

    public function showRestaurants2($location) {
        db_connection::startConnection();
        $sql = "SELECT * FROM `restaurant` where location='$location' and promotion IS NULL ORDER BY name LIMIT 5 OFFSET 5;";
        $result = mysqli_query(db_connection::$con, $sql);
        return $result;
    }

    public function showRestaurantswWithOffers($location) {
        db_connection::startConnection();
        $sql = "SELECT * FROM `restaurant` where location='$location' and promotion IS NOT NULL ORDER BY name LIMIT 5;";
        $result = mysqli_query(db_connection::$con, $sql);
        return $result;
    }

    public function showRestaurantswWithOffers2($location) {
        db_connection::startConnection();
        $sql = "SELECT * FROM `restaurant` where location='$location' and promotion IS NOT NULL ORDER BY name LIMIT 5 OFFSET 5;";
        $result = mysqli_query(db_connection::$con, $sql);
        return $result;
    }

    public function showMenu($id) {
        db_connection::startConnection();
        $sql = "SELECT * FROM `restaurant` where id='$id';";
        $result = mysqli_query(db_connection::$con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row;
                }
            }
        }
    }

    public function searchForRestaurant($name) {
        db_connection::startConnection();
        $sql = "SELECT * FROM `restaurant` where name='$name';";
        $result = mysqli_query(db_connection::$con, $sql);
        return $result;
    }

    public function getPoints($userid) {
        db_connection::startConnection();
        $sql = "SELECT numOfOrders FROM users where personID='$userid';";
        $result = mysqli_query(db_connection::$con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row;
                }
            }
        }
    }

    public function makeOrder($userid) {
        db_connection::startConnection();
        $sql = "UPDATE users SET numOfPoints=numOfPoints+1,numOfOrders=numOfOrders+1 WHERE personID='$userid';";
        $result = mysqli_query(db_connection::$con, $sql);
        return $result;
    }

}
