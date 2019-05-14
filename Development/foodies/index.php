<?php
require_once 'Personclass.php';
$Person=new Personclass();
$Person->login('mariam', 'mariam');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>hi</h1>
        <h1><?php  echo $Person->message; ?></h1>
    </body>
</html>
