<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

include '_dbconnect.php';
$user_email = $_POST['lemail'];
$pass = $_POST['lpassword'];

    $sql ="select * from users where user_email ='$user_email'";
    $result = mysqli_query($connection,$sql);
    $numRows = mysqli_num_rows(($result));
    if ($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $user_email;
            header("Location: /codingforum/index.php");
        }else{
            echo '';
        }

    }
}
