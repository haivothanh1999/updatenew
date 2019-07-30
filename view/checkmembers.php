<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>

<?php
$host="localhost";
$username="vohai";
$password="1234578";
$db_name="project_group2";
$tbl_name="account";

$con = mysqli_connect("$host", "$username", "$password", $db_name);

$your_name = trim($_POST["your_name"]);
$your_pass = trim($_POST["your_pass"]);



$result = mysqli_query($con,"Select your_name,pass_word from $tbl_name where your_name = '$your_name' and pass_word= '$your_pass';");

$row = mysqli_num_rows($result);
$ar = mysqli_fetch_array($result);

if($row==1) {
    session_start();
    $_SESSION["usn"] = $ar['your_name'];
    header("Location:../index.html");

}
?>

<script>
    alert("Sorry, Login failed !!");
    window.location.assign("index.php");
</script>

</body>
</html>