<?php

require_once 'Classes/db_connection.php';
require_once 'Classes/PersonClass.php';
class AdminClass extends PersonClass {

    public function deleteUser($userId) {
        db_connection::startConnection();
        $sql = "delete from `person` where userId='$userId';";
        $result = mysqli_query(db_connection::$con, $sql);
        return $result;
    }

    public function seachForUser($userId) {
        db_connection::startConnection();
        $sql = "SELECT * FROM `person` where userId='$userId' and idUserType=2 ;";
        $result = mysqli_query(db_connection::$con, $sql);
        return $result;
    }

     public function addRestaurant($restaurant) {
         db_connection::startConnection();
        $query = "select * from `restaurant` where name='$restaurant->name' and location='$restaurant->location';";
        $result = mysqli_query(db_connection::$con, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $restaurant->message = "This Restaurant already exist";
            } else {
                $names_item = implode(" , ",$restaurant->item);
                $names_price = implode(" , ",$restaurant->price);
                if($restaurant->promotion==""){
                    $restaurant->promotion=NULL;
                }
                $sql1 = "insert into `restaurant` (name,location,phone,promotion,item,price) "
                        . "values('$restaurant->name','$restaurant->location','$restaurant->phone','$restaurant->promotion','".$names_item."','".$names_price."')";
                $result1 = mysqli_query(db_connection::$con, $sql1);
                if ($result1) {
                        $restaurant->message = "Restaurant Added sucessfully";
                    }else {
                    $restaurant->message = "Incorrect data try again";
                }
                } 
            }
        }
    /*
    public function addRestaurant($restaurant) {
         db_connection::startConnection();
        $query = "select * from `restaurant` where name='$restaurant->name' and location='$restaurant->location';";
        $result = mysqli_query(db_connection::$con, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $restaurant->message = "This Restaurant already exist";
            } else {
                $sql1 = "insert into `restaurant` (name,location,phone,promotion) "
                        . "values('$restaurant->name','$restaurant->location','$restaurant->phone','$restaurant->promotion')";
                $result1 = mysqli_query(db_connection::$con, $sql1);
                if ($result1) {
                    $sql2 = "select id from `restaurant` where name='$restaurant->name';";
                    $result2 = mysqli_query(db_connection::$con, $sql2);
                    if ($result2) {
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_assoc($result2)) {
                                $id = $row['id'];
                            }
                        }
                    }
$names_item = implode(" , ",$restaurant->item);
$names_price = implode(" , ",$restaurant->price);
                            $sql3 = "insert into `menu`(`restaurant_id`, `item`, `price`) "
                                . "values('$id','".$names_item."','".$names_price."')";
                        $result3 = mysqli_query(db_connection::$con, $sql3);
                    if ($result3) {
                        $restaurant->message = "Restaurant inserted sucessfully";
                    }
                } else {
                    $restaurant->message = "Incorrect data try again";
                }
            }
        }
    }
    */
    
}
