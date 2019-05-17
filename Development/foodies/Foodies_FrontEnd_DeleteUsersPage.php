<?php
session_start();
require_once 'Classes/AdminClass.php';
$Admin = new AdminClass();
$message = "";
if (isset($_SESSION['UserID'])) {
    
} else {
    $Admin->logout();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete User</title>
    <center><img src="Photos/foodies.png" alt="user photo" style="width:200px; height:100px;"></center>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="main.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background-image:url("Photos/food.jpg");
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
        #table2 {
            border: 1px solid black;
            padding: 5px;
        }
        #table2 {
            border-spacing: 15px;
        }
        #deletepage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            height: 500px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
        label{
            color:white
        }
        #btn_search{
            height: 30px;
            color: #fff;
            font-size: 15px;
            background: orange;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 10%;
        }
        #btn_del1{
            height: 30px;
            color: #fff;
            font-size: 15px;
            background: orange;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 10%;
        }

        input[type="Reset"] {
            height: 30px;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 10%;
        }
    </style>
</head>

<body> 
    <div class="navbar">
        <a href="Foodies_FrontEnd_AdminProfile.php"><button  id= "btn_home" class="btn"><i class="fa fa-home"></i></br>Home</button></a>
        <a href="Foodies_FrontEnd_LoginPage.php" ><button id= "btn_logout" class="btn" style="float: right"><i class="fa fa-sign-out"></i></br>Logout</button></a>
        <a href="Foodies_FrontEnd_AdminProfile.php"><button id= "btn_account" class="btn" style="float: right"><i class="fa fa-user"></i></br>Account</button></a>
    </div>


<center>
    <div class="delete" id='deletepage'>
        <form method="post">
            <font color="red"> <?php if (isset($_POST['btn_search'])) echo$message; ?> </font>
            <input id='deluser1' name='Deleteuser1' type="text" maxlength="20" size="20" style="margin-top:10px" >
            <input class="delete"type="submit" id="btn_search" name="btn_search" value="Search">
			            
        </form>
             <?php
        if (isset($_POST['btn_search'])) {
            $key = $_POST['Deleteuser1'];
            $result = $Admin->seachForUser($key);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_object($result)) {
                        if (isset($row)) {
                            echo "<table id='eltable2' name='deletetable2'style='width:100%'>
			        <tr>
				<th style='width:100%;text-align:left;'><label for='id' >Search Result</label></th>
				<th></th>
			        </tr> ";
                            echo "<tr>";
                            echo "<td style='width:100%;text-align:left;' ><label for='id' style='color:Red;'>UserID : </label>"
                                  . "<label for='id'>$row->userId</label></td>";
                            echo "<td><a href='delete.php?ID=$row->userId'><button class='delete' id='btn_del1' name='btn_del1' >Delete</button></a></td>";
                            echo "</tr>";
                        }
                        echo"</table>";
                    }
                } else {
                    $message = "This User doesn't exist ";
                }
            }
        }
        if(isset($_POST['btnCancel'])){
            $key=NULL;
        }
        ?>
            <br><br><br><br><br><br><br><br><br><br>

        <input id='btn_cancel' name='btnCancel'type="Reset" value="Cancel" >



    </div>
</center>

</body>

</html>