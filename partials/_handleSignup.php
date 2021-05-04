<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include '_dbconnect.php';
    $user_email = $_POST['signupemail'];
    $pass = $_POST['signuppassword'];
    $cpass = $_POST['signupcpassword'];

    $existSQL ="select * from users where user_email ='$user_email'";
    $result = mysqli_query($connection,$existSQL);
    $numRows = mysqli_num_rows(($result));
    if($numRows>0){
        $showError = "Email already in use";
    }
    else{
        if($pass==$cpass){
            $hash = password_hash($pass,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES (NULL, '$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($connection,$sql);
            if($result){
                $showAlert = true ;
                header("Location: /codingforum/index.php?signupsuccess=true");
            }
                
        

        }
        else{
            header("Location: /codingforum/index.php?signupsuccess=false");
        }
        
    }

}


?>