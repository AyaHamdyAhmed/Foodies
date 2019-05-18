<?php
require_once 'Classes/UserClass.php';
ob_start();
session_start();
$newUser = new UserClass();
if (isset($_SESSION['UserID'])) {
    session_destroy();
}
?>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    <center><img src="Photos/foodies.png" alt="user photo" style="width:200px; height:100px;"></center>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="main.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function check_pass() {
            if (document.getElementById('password').value ==
                    document.getElementById('Confirmpassword').value) {
                document.getElementById('submit').disabled = false;

            } else {
                alert("Password Mis-Matched Confirm Password , Re-write again");
                document.getElementById('Confirmpassword').value = "";
                document.getElementById('password').value = "";
                document.getElementById('submit').disabled = true;
            }
        }
    </script>
<style>
        body {
            background-image: url("Photos/food.jpg");
            background-repeat: no-repeat;
            background-size: cover;

            /* background-color: #303641;*/
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Raleway', sans-serif;
            color: #F2F2F2;
        }

        #container-login {
           /* background-color: #1D1F20;*/
            background: rgba(0,0,0,.5);
            position: relative;
            top: 20%;
            margin: auto;
            width: 340px;
            height: 445px;
            border-radius: 0.35em;
           /* box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.2);*/
            text-align: center;
        }

        #container-register {
           /* background-color: #1D1F20;*/
            background: rgba(0,0,0,.5);
            position: relative;
            top: 5%;
            margin: auto;
            width: 400px;
            height: 650px;
            border-radius: 0.35em;
           /* box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.2);*/
            text-align: center;
        }

        #title {
            position: relative;
            background: rgba(0,0,0,.5);
           /* background-color: #1A1C1D;*/
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
            color:floralwhite;
           /* color: #949494;*/
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



        *:focus {
            outline: none;
        }


        input[type=submit] {
            padding: 6px 25px;
            background:orange;
           /* background: #373E4A;
            color: #C1C3C6;*/
            color:azure;
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
           /* border-top: 1px solid #C1C3C6;*/
            background: rgba(0,0,0,.5);
            opacity: 60%;

        }

        .clearfix {
            clear: both;
        }

        #register-link {
            margin-top: 10px;
            padding: 6px 25px;
            background:orange;
            color:azure;
           /* background: #373E4A;
            color: #C1C3C6;*/
            font-weight: bold;
            border: 0 none;
            cursor: pointer;
            border-radius: 3px;

        }
    
</style>   
</head>

<body>
    <div id="container-register">
        <div id="title">
            <i class="material-icons lock">lock</i> Register
        </div>

        <form name=RegForm onsubmit="return validateForm()" method="post">
          
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">email</i>
                </div>
                <input id="email" name="email" placeholder="Email" type="email" required class="validate" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" autocomplete="off">
                <!-- Pattern may be pattern= "[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" -->
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="userid" name="userid" placeholder="UserID" type="text" required class="validate" autocomplete="off" required class="validate" minlength="4" maxlength="8"
                       title="Enter Valid data between 4 and 8 Alphanumeric UserID" pattern="[A-Za-z0-9]+"
                       >
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password"  name="password" placeholder="Password" type="password" required class="validate" minlength="8" maxlength="10" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
                       title="Please Choose A Strong password [Capital , lower letters , numbers and special characters]" 
                       autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="Confirmpassword" name="confirmPassword" placeholder=" Confirm Password" type="password" minlength="8" maxlength="10" required class="validate" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
                       title="Please Choose A Strong password [Capital , lower letters , numbers and special characters]" 
                       onchange='check_pass();' autocomplete="off">
            </div>
            <br>
            <div class="field-wrap" name="radioGrp">
                <input type="radio" id="Male1" name="gender" checked value="Male">
                <label for="Male1"> Male</label>
                <input type="radio" id="Female1" name="gender" value="Female">
                <label for="Female1"> Female</label>
            </div>
            <br>

            <div class="user-address" name=DropLocMenu>
                Location: <select name="location">
                    <option value="Cairo">Cairo</option>
                    <option value="Giza">Giza</option>
                    <option value="Alexandria">Alexandria</option>
                </select>
                <br>
                <br>
                <br>
            </div>
            <input id="submit" type="submit" name="regBtn" value="Register" />
        </form>
        <?php
        if (isset($_POST['regBtn'])) {
            $newUser->userId = $_POST['userid'];
            $newUser->email = $_POST['email'];
            $newUser->password = $_POST['password'];
            $newUser->location = $_POST['location'];
            $newUser->gender = $_POST['gender'];
            $result = $newUser->signUp($newUser);
        }
        ?>
          <font color="red"> <?php if (isset($_POST['regBtn'])) echo$newUser->message; ?> </font>
        <div class="register">
            Do you already have an account?
            <a href="Foodies_FrontEnd_LoginPage.php"><button name="logInBtn" id="register-link">Log In here</button></a>
        </div>
    </div>
</body></html>
