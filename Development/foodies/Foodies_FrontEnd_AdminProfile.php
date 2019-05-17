<?php
session_start();
require_once 'Classes/Personclass.php';
require_once 'Classes/AdminClass.php';
$Admin =new AdminClass();
if (isset($_SESSION['UserID'])) {
    $userid = $_SESSION['UserID'];
} else {
    $Admin->logout();session_start();

}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Profile</title>
    <center><img src="Photos/foodies.png" alt="user photo" style="width:200px; height:100px;"></center>

    <meta name="viewport" content="width=device-width" initial-scale="1.0">
    <!-- <link rel="stylesheet" href="main.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background-image: url("Photos/food.jpg");
            background-repeat: no-repeat;
            background-size: cover;

            /* background-color: #303641;*/
        }
        * {
            box-sizing: border-box;
        }

        /* Style the body */
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }


        /* Style the top navigation bar */
        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        .btn {
            background-color: #333;
            border: none;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Style the navigation bar links */
        .navbar button {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        /* Change color on hover */
        .navbar button:hover {
            background-color: #ddd;
            color: black;
        }

        .side {
            flex: 30%;
            background-color: #f1f1f1;
            padding: 20px;
        }

        <!-- Main column -->.main {
            flex: 70%;
            background-color: white;
            padding: 20px;
        }

        /* Footer */
        .footer {
            padding: 20px;
            text-align: center;
            background: #ddd;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Raleway', sans-serif;
            color: #F2F2F2;
        }


        #container-login
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            height: 400px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }

        #container-register {
            background-color: #1D1F20;
            position: relative;
            top: 5%;
            margin: auto;
            width: 400px;
            height: 600px;
            border-radius: 0.35em;
            box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        #title {
            position: relative;
            background-color: #1A1C1D;
            width: 80%;
            padding: 10px 2px;
            border-radius: 0.35em;
            font-size: 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .lock {
            position: relative;
            top: 2px;
        }

        .input {
            margin: auto;
            width: 240px;
            border-radius: 50px;
            background-color: orange;
            padding: 8px 0px;
            margin-top: 15px;
        }

        .input-addon {
            float: left;
            background-color: #373b3d;
            border: 1px solid #373b3d;
            padding: 4px 8px;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        input[type=checkbox] {
            cursor: pointer;
        }

        input[type=text] {
            color: #949494;
            margin: 0;
            background-color: #373b3d;
            border: 1px solid #373b3d;
            padding: 6px 0px;
            border-radius: 3px;
        }

        input[type=text]:focus {
            border: 1px solid #373b3d;
        }

        input[type=password] {
            color: #949494;
            margin: 0;
            background-color: #373b3d;
            border: 1px solid #373b3d;
            padding: 6px 0px;
            border-radius: 3px;
        }

        input[type=password]:focus {
            border: 1px solid #373b3d;
        }

        input[type=email] {
            color: #949494;
            margin: 0;
            background-color: #373b3d;
            border: 1px solid #373b3d;
            padding: 6px 0px;
            border-radius: 3px;
        }

        input[type=email]:focus {
            border: 1px solid #373b3d;
        }

        .privacy {
            margin-top: 5px;
            position: relative;
            font-size: 12px;
            bottom: 0%;
        }

        .privacy a:link {
            color: #949494;
            text-decoration: none;
        }

        .privacy a:visited {
            color: #949494;
            text-decoration: none;
        }

        .privacy a:hover {
            color: #C1C3C6;
            transition: color 1s;
        }

        *:focus {
            outline: none;
        }


        input[type=submit] {
            padding: 6px 25px;
            background: #373E4A;
            color: #C1C3C6;
            font-weight: bold;
            border: 0 none;
            cursor: pointer;
            border-radius: 9px;
        }

        .register {
            margin: auto;
            padding: 16px 0;
            text-align: center;
            margin-top: 40px;
            width: 85%;
            border-top: 1px solid #C1C3C6;
            opacity: 60%;

        }

        .clearfix {
            clear: both;
        }

        #register-link {
            margin-top: 10px;
            padding: 6px 25px;
            /* background-color:#ffffff;*/
            background: #373E4A;
            color: #C1C3C6;
            font-weight: bold;
            border: 0 none;
            cursor: pointer;
            border-radius: 3px;

        }
        #btn_logout1 {
            height: 35px;
            width:200px;
            color: #fff;
            font-size: 15px;
            background: orange;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 15%;
        }


    </style>
</head>

<body>

    <div class="navbar">
       <a href="Foodies_FrontEnd_AdminProfile.php"><button  id= "btn_home" class="btn"><i class="fa fa-home"></i></br>Home</button></a>
       <a href="Foodies_FrontEnd_LoginPage.php" ><button id= "btn_logout" class="btn" style="float: right"><i class="fa fa-sign-out"></i></br>Logout</button></a>
       <a href="Foodies_FrontEnd_AdminProfile.php"><button id= "btn_account" class="btn" style="float: right"><i class="fa fa-user"></i></br>Account</button></a>
    </div>

    <div id="container-login">
        <center><div id="title">
                <img src="Photos/profile.png" width="30px" height="30px" alt="admin photo"></br>  
                <font color="white"> <?php echo$userid; ?> </font>
            </div>
        </center>

            <center>
                <a href="Foodies_FrontEnd_AddMenu.php"> <button id= "btn_logout1">Add Restaurant</button></a>
                <a href="Foodies_FrontEnd_DeleteUsersPage.php"> <button id= "btn_logout1">Delete User</button></a>
            </center>

    </div>		
</body>

</html>
