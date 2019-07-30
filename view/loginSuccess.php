<?php
session_start();
if(!isset($_SESSION['usn'])) {
    header("Location:index.html");
}

?>

    <html>
    <head>
        <title>Welcome to WS</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <h2> Successfully!!</h2>
    <h3><?php echo "Hello ".$_SESSION['usn'];?></h3>
    <a href="../index.html">Log out</a>
    </body>
    </html>












