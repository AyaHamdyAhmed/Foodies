<?php
session_start();
require_once 'Classes/Personclass.php';
ob_start();
$Person = new Personclass();
if (isset($_SESSION['UserID'])) {
   session_destroy();
} else {
    if (isset($_POST['sub'])) {
        $userid = $_POST['User_Id'];
        $pass = $_POST['password'];
        $Person->login($userid, $pass);
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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

        /* foodStyle the body */
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

        #container-login {
            background-color: #1D1F20;
            position: relative;
            top: 5%;
            margin: auto;
            width: 340px;
            height: 445px;
            border-radius: 0.35em;
            box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
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
            width: 100%;
            padding: 20px 0px;
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
            border-radius: 4px;
            background-color: #373b3d;
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
            border-radius: 3px;
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

    </style>
</head>

<body>


    <div id="container-login">
        <div id="title">
            <i class="material-icons lock">lock</i> Login
        </div>

        <form method="post" action="Foodies_FrontEnd_LoginPage.php">
            <font color="red"> <?php if (isset($_POST['sub'])) echo$Person->message; ?> </font>
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="userid" name="User_Id" placeholder="UserID" value="<?php if (isset($userid)) echo$userid; ?>" type="text" required class="validate" autocomplete="off" required  />
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password" name="password" placeholder="Password" value="<?php if (isset($pass)) echo$pass; ?>" type="password" required class="validate">
            </div>
            <br />
            <input type="submit" value="LogIn" name="sub" />
        </form>



        <div class="register">
            Don't have an account yet?
            <a href="Fooides_FrontEnd_Register.php"><button id="register-link">Register here</button></a>
        </div>
    </div>




</body>

</html>
