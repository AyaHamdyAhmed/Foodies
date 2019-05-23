<?php
session_start();
require_once 'Classes/AdminClass.php';
require_once 'Classes/RestaurantClass.php';
$Admin = new AdminClass();
$Restaurant = new RestaurantClass();
if (isset($_SESSION['UserID'])) {
                if (isset($_POST['sub'])) {
                $Restaurant->name = $_POST['name'];
                $Restaurant->phone = $_POST['phone'];
                $Restaurant->location = $_POST['location'];
                $Restaurant->promotion = $_POST['promotion'];
                $Restaurant->item[0] = $_POST['Item1'];
                $Restaurant->price[0] = $_POST['Price1'];
                $Restaurant->item[1] = $_POST['Item2'];
                $Restaurant->price[1] = $_POST['Price2'];
                $Restaurant->item[2] = $_POST['Item3'];
                $Restaurant->price[2] = $_POST['Price3'];
                $Restaurant->item[3] = $_POST['Item4'];
                $Restaurant->price[3] = $_POST['Price4'];
                $Restaurant->item[4] = $_POST['Item5'];
                $Restaurant->price[4] = $_POST['Price5'];
                $Admin->addRestaurant($Restaurant);
            }
}  else {
    $Admin->logout();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel = "icon" type = "image/png" href = "Archived\img2.png">
    <!-- <link rel="stylesheet" href="main.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-image: url("Photos/food.jpg");
            background-repeat: no-repeat;
            background-size: cover;
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

        <!-- Main column --> * {
            box-sizing: border-box;
        }

        input[type=text],
        select{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: orange;
            color: white;
            padding: 15px 35px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin-left:20px;
        }

        input[type=submit]:hover {
            background-color: #333;
        }
        input[type=reset] {
            background-color: orange;
            color: white;
            padding: 15px 35px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin-left:10px;
        }
        input[type=reset]:hover {
            background-color: #333;
        }
        <!--.container {
            border-radius: 5px;
            background-color: #000000;
            padding: 10px;
            margin-left: 120px;
            margin-right: 120px;
            <!--margin-top: 20px;

        }-->
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 50%;
            height: 91%;
            padding: 40px 40px;
            box-sizing: border-box;
            margin-top: 100px;
            background: rgba(0,0,0,.5);
        }
        label{
            font-weight:bold;
        }

        .col-25 {
            float: left;
            width: 32%;
            margin-top: 6px;
        }

        .col-26 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 55%;
            margin-top: 6px;
        }
        /* Clear floats after the columns */

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */

        @media screen and (max-width: 600px) {
            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
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
    </style>
</head>

<body>
    <div class="navbar">
        <a href="Foodies_FrontEnd_AdminProfile.php"><button  id= "btn_home" class="btn"><i class="fa fa-home"></i></br>Home</button></a>
        <a href="Foodies_FrontEnd_LoginPage.php" ><button id= "btn_logout" class="btn" style="float: right"><i class="fa fa-sign-out"></i></br>Logout</button></a>
        <a href="Foodies_FrontEnd_AdminProfile.php"><button id= "btn_account" class="btn" style="float: right"><i class="fa fa-user"></i></br>Account</button></a>
    </div>
    <div class="container">
        <center>
            <h2 style="margin-top:1px;">Add Restaurant</h2></center>
            <font color="red"> <?php if (isset($_POST['sub'])) {echo $Restaurant->message; } ?> </font>
            <form action="Foodies_FrontEnd_AddMenu.php" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="rname">Restaurant Name</label>
                </div>
                <div class="col-75">
                    <input type="text"  name="name" placeholder="Restaurant name" required maxlength="20"/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="phoneNo">Restaurant Phone</label>
                </div>
                <div class="col-75">
                    <input type="text"  name="phone" placeholder="Restaurant Phone Number" required maxlength="11"/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="country">Location</label>
                </div>
                <div class="col-75">
                    <select id="country" name="location" required>
                        <option value="Cairo">Cairo</option>
                        <option value="Giza">Giza</option>
                        <option value="Alexandria">Alexandria</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="promoNo">Restaurant Promotion</label>
                </div>
                <div class="col-75">
                    <input type="text" name="promotion" placeholder="Restaurant promotion.." maxlength="20" />
                </div>
            </div>
            <div class="row">
                <div class="col-26">
                    <label for="Item1">Item1</label>
                </div>
                <div class="col-26" >
                    <input type="text"  required name="Item1" placeholder="Item1.." style="margin-left:33px;" maxlength="20" required/>
                </div>
                <div class="col-26">
                    <input type="text"  required name="Price1" placeholder="Price.." style="margin-left:75px;" maxlength="3" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-26">
                    <label for="Item2">Item2</label>
                </div>
                <div class="col-26">
                    <input type="text"  name="Item2" placeholder="Item2.." style="margin-left:33px;" maxlength="20" value="" required/>
                </div>
                <div class="col-26">
                    <input type="text" name="Price2" placeholder="Price.." style="margin-left:75px;" maxlength="3" value="" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-26">
                    <label for="Item3">Item3</label>
                </div>
                <div class="col-26">
                    <input type="text"  name="Item3" placeholder="Item3.." style="margin-left:33px;" maxlength="20" value="" required/>
                </div>
                <div class="col-26">
                    <input type="text"  name="Price3" placeholder="Price.." style="margin-left:75px;" maxlength="3" value="" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-26">
                    <label for="Item4">Item4</label>
                </div>
                <div class="col-26">
                    <input type="text"  name="Item4" placeholder="Item4.." style="margin-left:33px;" maxlength="20" value="" required/>
                </div>
                <div class="col-26">
                    <input type="text"  name="Price4" placeholder="Price.." style="margin-left:75px;" maxlength="3" value="" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-26">
                    <label for="Item5">Item5</label>
                </div>
                <div class="col-26">
                    <input type="text"  name="Item5" placeholder="Item5.." style="margin-left:33px;" maxlength="20" value="" required/>
                </div>
                <div class="col-26">
                    <input type="text"  name="Price5" placeholder="Price.."style="margin-left:75px;" maxlength="3" value="" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-26">

                </div>
                <div class="col-26">
                    <input id="subBTN" name="sub" type="submit" value="Submit" style="margin-left:33px;"/>
                </div>
                <div class="col-26">
                    <input id="canBTN" name="cancel" type="reset" value="Cancel" style="margin-left:75px;"/>
                </div>
            </div>
        </form>
    </div>
</body>

</html>