<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <title>Welcome to iDiscuss - The Coding forums</title>
</head>

<body>
    <?php
    include 'partials/_header.php';
    ?>
    <?php
    include 'partials/_dbconnect.php';
    ?>

    <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $id = $_GET['threadid'];     
            $comment = $_POST['comment'];
            $sno = $_SESSION['sno'];
            $sql = "INSERT INTO `comments` (`comment_id`, `comment`, `thread_id`, `comment_user_id`, `created`) VALUES (NULL, '$comment', '$id', '$sno', current_timestamp())";            
            $result = mysqli_query($connection,$sql);
            if($result){
                echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thank you for answering !</strong> Kindly keep in touch with  the community.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
            else{
                echo $result;
                echo mysqli_error($connection);
            }
            

        }
        
        ?>

    <?php
    $id = $_GET['threadid'];
    $sql_query = "SELECT * FROM `threads` WHERE `thread_id` =" . $id . " ";
    $result = mysqli_query($connection, $sql_query);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_description'];
        $thread_user_id = $row['thread_user_id'];
        $sql2 = "select user_email from `users` where sno='$thread_user_id'";
        $result2 = mysqli_query($connection,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
    }
    
    
    echo '<div class="container"> <div class="jumbotron">
    <h1 class="display-6">'.$title.'</h1>
    <p class="lead">'.$desc.'</p>
    <hr class="my-4">
    <p>Posted by <b> <em>'.$row2["user_email"].'</em></b></p>
    </div>  <div class = "container"><h1 class="my-3">Post a comment</h1>';

    ?>

    <?php if((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true){
    echo ' <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
    <div class="modal-body">

        <div class="form-group">
            <label for="desc">Type your Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            <small id="emailHelp" class="form-text text-muted">This is an expandable comment box. </small>

        </div>
        <button type="submit" class="btn btn-success">Submit </button>
    </div>
</form>
</div>';}
else{
    echo '<div class="container"><div class="lead">
     You are not logged in . Please log in to answer a forum.
       </div>
       </div>'; 
}

   ?>
    <div class="container">
        <h1 class="my-5">Discussions</h1>

        <?php 
    $id = $_GET['threadid'];
    $sql_query = "SELECT * FROM `comments` WHERE `thread_id` =".$id." ";
    $result = mysqli_query($connection,$sql_query);?>

        <?php

        if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
        {
            $thread_user_id = $row['comment_user_id'];

            $sql2 = "select user_email from `users` where sno='$thread_user_id'";
            $result2 = mysqli_query($connection,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $comment = $row['comment'];
            echo   ' <div class="media my-3">
            <img src="img/user.jpg" width="64px" height="64px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-3">'.$row2['user_email'].' at '.$row['created'].'</p>
                '.$comment.'
                
            </div>
            
        </div>';
    }}
    else{
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No answers yet</h1>
          <p class="lead">Be the first person to answer the question.</p>
        </div>
      </div>';
    }
    ?>







    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <?php 
    include 'partials/_footer.php';
    ?>
</body>

</html>