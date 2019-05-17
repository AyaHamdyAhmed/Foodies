<?php
session_start();
require_once 'Classes/UserClass.php';
require_once 'Classes/RestaurantClass.php';
ob_start();
$user = new UserClass();
$restaurant = new RestaurantClass();
$message = "";
if (isset($_SESSION['UserID'])) {
    if (isset($_SESSION['restID'])) {
        $id = $_SESSION['restID'];
        $result = $user->showMenu($id);
        if ($result) {
            $name = $result['name'];
            $location = $result['location'];
            $phone = $result['phone'];
            $promotion = $result['promotion'];
            $item = $result['item'];
            $item_explode=  explode(" , ", $item);
            $price = $result['price'];
            $price_explode=  explode(" , ", $price);
        }
        $res = $user->getPoints($_SESSION['ID']);
        if ($res) {
            $order = $res['numOfPoints'];
            if ($order % 5 === 0) {
                $message = "Congratulations you have one order free";
            } else {
                $message = "";
            }
        }
    }
} else {
    $user->logout();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Restaurant</title>
    <center><img src="Photos/foodies.png" alt="user photo" style="width:200px; height:100px;"></center>

    <meta name="viewport" content="width=device-width" initial-scale="1.0">
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

        td {
            padding: 15px;
        }
        label,h2,td{
            color:white
        }

        #btn_submit
        {
            height: 30px;
            width: 80px;
            color: #fff;
            font-size: 15px;
            background: orange;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 15%;
        }

        #show_menu {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 450px;
            height: 480px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
    </style>

    <script type="text/javascript">
        var o="";
        function confirm_message() {
            var c = confirm("Restaurant Phone is : <?php echo $phone; echo $message; ?>");
            if (c == true) {
                o = "1";
            } else {
                o = "0";
            }
                   document.getElementById("order").value = o;            
        }
    </script>
</head>

<body> 
    <div class="navbar">
        <a href="Foodies_FrontEnd_Homepage.php"><button  id= "btn_home" class="btn"><i class="fa fa-home"></i></br>Home</button></a>
        <a href="Foodies_FrontEnd_LoginPage.php" ><button id= "btn_logout" class="btn" style="float: right"><i class="fa fa-sign-out"></i></br>Logout</button></a>
        <a href="Foodies_FrontEnd_UserProfile.php"><button id= "btn_account" class="btn" style="float: right"><i class="fa fa-user"></i></br>Account</button></a>
    </div>

    <form>
        <center>

            <div class="menu" id='show_menu'>
                <h2 style="margin-top:1px">Restaurant Menu</h2>
                <table  style="width:100%; margin-top:5px;">
                        <td colspan=3><label>Restuarant Name</label></td>
                        <td colspan=3><label>Location</label></td>
                    </tr>
                    <tr>
                        <td colspan=3><label for="id"><?php echo $name; ?> </label></td>
                        <td colspan=3><label for="id"><?php echo $location; ?></td>
                    </tr>

<?php 
 echo "<tr>";
  echo "<td id='item1'>";
 foreach($item_explode as $i){
     if($i!=""){
 echo $i ,'<br>' ;
     }
 }
  echo "</td>";
 echo "<td></td>";
  echo "<td id='price1'>";
 foreach($price_explode as $p){
     if($p!=""){
 echo $p ,'<br>';
     }
 }
 echo "</td>"; 
 echo "<td></td>";
 echo "<td>";
  foreach($price_explode as $p){
      if($p!=""){
 echo"EGP" ,'<br>';
      }
  }
 echo"</td>";
 echo "</tr>";

?>
                    
                        
                        
                     
                        
                        
                    



                </table>
                <input id='btn_submit' type="submit" name="order" value="Order" onclick="confirm_message()" >

            </div>

        </center>
    </form>
    <form method="post">
        <input type="hidden" id="order" name="order" />
        <input type="hidden" name="sub" id="hidden1"/>
       
            <?php
    if(isset($_POST['sub'])){
        if($_POST['order']=="1"){
        $user->makeOrder($_SESSION['ID']);            
        }
    }
    ?>
    </form>
</body>

</html>