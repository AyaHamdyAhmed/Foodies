<?php
session_start();
require_once 'Classes/UserClass.php';
$user =new UserClass();
if (isset($_SESSION['UserID'])&& $_SESSION['IdUserType']==2) {
    $userid = $_SESSION['UserID'];
    $email=$_SESSION['Email'];
    $result=$user->getFreeOrders($_SESSION['ID']);
    if($result){
        $free=$result['numOfFreeOrders'];
    }
    $result2=$user->getPoints($_SESSION['ID']);
    if($result2){
        $points=$result2['numOfPoints'];
        while($points>5)
        {
            $points=$points-5;
        }
        switch ($points)
        {
            case 0 :
                $width=0;
                break;
            case 1 :
                $width=20;
                break;
            case 2 :
                $width=40;
                break;
            case 3 :
                $width=60;
                break;
            case 4 :
                $width=80;
                break;
            case 5:
                $width=100;
                break;
        }
    }
} else {
    $user->logout();
}
?>
<html>
<head>
    <meta charset="UTF-8">
<center><img src="Photos/foodies.png" alt="user photo" style="width:200px; height:100px;"></center>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="main.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
 td {
  padding: 10px;
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
			width:  200px; 
            color: #fff;
            font-size: 15px;
            background: orange;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 15%;
        }
		
		#myProgress {
  width: 100%;
  background-color: black;
  margin-left: 120%;
}

#myBar {
  width: 30%;
  height: 30px;
  background-color: #4CAF50;
}


    </style>
</head>

<body>
        <div class="navbar">
            <a href="Foodies_FrontEnd_Homepage.php" style="float: left; margin-left:10px;margin-right:10px;"><img src="Archived/img2.png" alt="user photo" style="width:50px; height:50px; margin-top:8px;"></a>
            <!-- <button href="#" id= "btn_home" class="btn"><i class="fa fa-home"></i></br>Home</button> -->
            <a href="Foodies_FrontEnd_LoginPage.php"> <button id= "btn_logout" class="btn" style="float: right;"><i class="fa fa-sign-out"></i></br>Logout</button></a>
            <a href="Foodies_FrontEnd_UserProfile.php">  <button id= "btn_account" class="btn" style="float: right; "><i class="fa fa-user"></i></br>Account</button></a>
        </div>

    <div id="container-login">
        <center><div id="title">
                <img src="Photos/profile.png" width="30px" height="30px" alt="admin photo"></br> <?php echo$userid; ?>
        </div>
         </center>
		<table style="width:100%; margin-top:50px">
			<tr>
				<td>Email:</td>
				<td style="width:60%"><?php echo$email; ?></td>
			</tr>
			<tr>
				<td >  <label> Loyalty Points</label> </td>
 <td> <div class="progress">
         <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $width;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $width;?>%">
      
    </div>
  </div> 
				
				</td>
			</tr>
			<tr>
				<td>Free Orders:</td>
				<td><?php echo$free; ?></td>
			</tr>
			
				
     
</div>		
</body>

</html>