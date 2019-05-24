<?php
session_start();
require_once 'Classes/UserClass.php';
ob_start();
$user = new UserClass();
if (isset($_SESSION['UserID']) && $_SESSION['IdUserType']==2) {
    $userid = $_SESSION['ID'];
    $result = $user->getLocation($userid);
    $result2 = $user->showRestaurants($result);
} else {
    $user->logout();
}
?>
<html lang="en">
    <!--link for navbar icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <head>
        <title>Foodies</title>
        <meta charset="UTF-8">
        <link rel = "icon" type = "image/png" href = "Archived/img2.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * {
                box-sizing: border-box;
            }

            /* Style the body */

        body {
            background-image:url("Photos/food.jpg");
            background-repeat: no-repeat;
            background-size: cover;

            /* background-color: #303641;*/
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

            /* style input */
            input{
                padding: 12px 16px;
            }

            /* Change color on hover */
            .navbar button:hover, .btn:hover{
                background-color: #ddd;
                color: black;
            }

            .btn_menu {
                background-color: #333;
                border: none;
                color: white;
                padding: 12px 16px;
                font-size: 16px;
                cursor: pointer;
            }

            /* Change menu button color on hover */
            .btn_menu:hover{
                background-color: #f1f1f1;
                color: black;
            }
            .side {
                flex: 100%;
                background-color: #f1f1f1;
                padding: 20px;
            }



            /* results */
            .results {
                padding: 20px;
 
            }
            .anchor {
                text-decoration: none;
                display: inline-block;
                padding: 8px 16px;
            }

            .anchor:hover {
                background-color: #ddd;
                color: black;
            }

            .previous {
                background-color: #f1f1f1;
                color: black;
            }

            .next {
                background-color: #333;
                color: white;
            }

            /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
            @media only screen and (max-width: 800px) {
                .side{
                    height:200px;  
                    display: grid;
                    grid-template-columns: 1fr 1fr 1fr;
                    grid-template-rows: 50px 50px;
                }

            }
                    #container-register {
           /* background-color: #1D1F20;*/
            background: rgba(0,0,0,.4);
            position: relative;
            top: 5%;
            margin: auto;
            width: 100%;
            height: 650px;
            border-radius: 0.35em;
           /* box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.2);*/
        }
        </style>
    
    </head>

<script>
alert("Can we access your location to know the near restaurants so you can get food FASTER!");
</script>
    <body>

        <div class="navbar">
            <a href="Foodies_FrontEnd_Homepage.php" style="float: left; margin-left:10px;margin-right:10px;"><img src="Archived/img2.png" alt="user photo" style="width:50px; height:50px; margin-top:8px;"></a>
            <!-- <button href="#" id= "btn_home" class="btn"><i class="fa fa-home"></i></br>Home</button> -->
            <a href="Foodies_FrontEnd_LoginPage.php"> <button id= "btn_logout" class="btn" style="float: right;"><i class="fa fa-sign-out"></i></br>Logout</button></a>
            <a href="Foodies_FrontEnd_UserProfile.php">  <button id= "btn_account" class="btn" style="float: right; "><i class="fa fa-user"></i></br>Account</button></a>
        </div>

        <div class="row">
            <div class="side">
                <div  style="margin:100px; margin-top:10px; margin-bottom:10px;">
                    <form action="" method="post">
                        <input id="input_search" placeholder="Search" name="search" type="text" value="">
                        <input class="btn" id="btn_search" name="sub" type="submit" value="Search">
                    </form>
					                        <a href="Foodies_FrontEnd_OffersPage.php"><button class="btn"  style="float:right">Go to restaurants with offers</button></a>

                </div>
            </div>
        </div>
<div id="container-register">
        <div class="results" height="100%">
            <div style="margin:100px; margin-top:10px; margin-right:250px;">
                <?php
                if (isset($_POST['sub'])) {
                    $key = trim($_POST['search']);
                    $result = $user->searchForRestaurant($key);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<h2 style='color:black;text-shadow: 2px 2px 5px white;'>Search Result</h2>";
                            while ($row = mysqli_fetch_object($result)) {
                                if (isset($row)) {
                                    echo "<table style='margin-left:50px;'>";
                                    echo "<tr>
                        <td id='rest1' width='100%'><font style = 'color:white;font-size:25px;'><b>$row->name</b></font></td><td><a href='restaurantAddress.php?ID=$row->id'><button class='btn_menu' id='btn_menu1'>Menu</button></a></td>
                    </tr>";
                                }
                                echo"</table>";
                            }
                        }  
                    }
                }
                ?>
                <h2 style="color:black;text-shadow: 2px 2px 5px white;">Nearby Restaurants</h2>
                <?php
                if ($result2) {
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row = mysqli_fetch_object($result2)) {
                            if (isset($row)) {
                                echo "<table style='margin-left:50px;'>";
                                echo "<tr>
                        <td id='rest1' width='100%'><font style = 'color:white;font-size:25px;'><b>$row->name</b></font></td><td><a href='restaurantAddress.php?ID=$row->id'><button class='btn_menu' id='btn_menu1'>Menu</button></a></td>
                    </tr>";
                            }
                            echo"</table>";
                        }
                    }else {
                            echo "<font style = 'font-size:25px;font-style:italic;color:red'> There is no near restaurants from you :( </font>
";    
                        }
                }
                ?>




                <p align="center">

                    <!-- <a id="href_prev" class="anchor" href="#">&#60;&#60;Previous  </a><a id="href_next" class="anchor" href="#">  Next&#62;&#62;</a> -->
                    <a href="" id="href_prev" class="anchor previous">&laquo; Previous</a>
                    <a href="Foodies_FrontEnd_Homepage2.php" id="href_next" class="anchor next">Next &raquo;</a>
                </p>
            </div>
            </div>
        </div>
    </body>
</html>
