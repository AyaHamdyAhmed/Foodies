<?php

class db_connection {
public static $host = "localhost";
public static $username = "root";
public static $password = "";
public static $db = "Foodies";
public static $con;

public static function startConnection()
 {
     db_connection::$con = mysqli_connect(db_connection::$host, db_connection::$username, db_connection::$password, db_connection::$db);
        if (db_connection::$con->connect_error) {
            die("Connection failed: " . db_connection::$con->connect_error);
        }
      //  echo "Connected successfully";
 }

}
