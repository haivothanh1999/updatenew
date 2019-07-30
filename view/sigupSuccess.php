
<?php
include "connect.php";
if (isset($_POST["signup"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $username = mysqli_real_escape_string($conn,$_POST["name"]);
    $password = mysqli_real_escape_string($conn,$_POST["pass"]);

    $repass = mysqli_real_escape_string($conn,$_POST["re_pass"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống

    if ($username == "" || $password == "" || $email == "") {
        echo "bạn vui lòng nhập đầy đủ thông tin";
    } else {
        // Kiểm tra tài khoản đã tồn tại chưa
        $sql = "select * from account where your_name='$username'";
        $kt = mysqli_query($conn, $sql);

        if (mysqli_num_rows($kt) > 0) {
            echo "Tài khoản đã tồn tại";

        } else {
            //thực hiện việc lưu trữ dữ liệu vào db
            $sql = "INSERT INTO account( your_name,email, pass_word ) VALUES ('$username','$email','$password')";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            mysqli_query($conn, $sql);
            if($password != $repass){
                echo " Mat Khau Khong Trung Nhau ";

            }
            else{
                echo " ban dang ky thanh cong";
            }
        }
    }
}
?>

<html>
<head>
    <title>Welcome to WS</title>
    <meta charset="UTF-8">
</head>
<body>
<br>
<a href="./sign_up.php"> Exit</a>
</body>
</html>

