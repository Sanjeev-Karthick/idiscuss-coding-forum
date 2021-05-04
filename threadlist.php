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
    $id = $_GET['catid'];
    if(isset($_SESSION['sno'])){
        $sno = $_SESSION['sno'];
    }
   
    $sql_query = "SELECT * FROM `categories` WHERE `category_id` ='$id' ";
    $result = mysqli_query($connection,$sql_query);
    while($row = mysqli_fetch_assoc($result)){
        $cat = $row['category_name'];
    $des = $row['category_description'];

    }
    

    ?>

    <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $category_id = $_GET['catid'];     
            $title = $_POST['prob_title'];
            $description=$_POST['prob_description']; 
            $sql = "INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `created`) VALUES (NULL, '$title', '$description', '$category_id', '$sno', current_timestamp())";
            $result = mysqli_query($connection,$sql);
            if($result){
                echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Your thread has been added!</strong> Please wait till someone answers your thread in the community.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
            

        }
        
        ?>


    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $cat;?> forum</h1>
            <p class="lead"><?php echo $des;?>.</p>
            <hr class="my-4">
            <ul>
                <li>No Spam / Advertising / Self-promote in the forums......... </li>
                <li>Do not post copyright-infringing material.......... </li>
                <li>Do not post “offensive” posts, links or images.......... </li>
                <li>Remain respectful of other members at all times</li>

            </ul>


            .</p>

        </div>
    </div>


    <?php 
    ?>

    <?php if((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true){
        echo '<form action="'.$_SERVER["REQUEST_URI"].'?>" method="POST">

    <div class="container">
        <h1 class="my-4">Start a discussion</h1>
        <div class="form-group">
            <label for="title">Problem title</label>
            <small id="emailHelp" class="form-text text-muted">Keep your problem title short and crisp.</small>
            <input type="text" class="form-control" id="titleEdit" name="prob_title" ; aria-describedby="emailHelp">
        </div>

        <div class="form-group">
            <label for="desc">Elaborate your concern </label>
            <textarea class="form-control" id="descriptionEdit" name="prob_description" rows="3"></textarea>
            <small id="emailHelp" class="form-text text-muted">(This is an expandable query box). </small>

        </div>
        <button type="submit" class="btn btn-success">Submit </button>

        </form>';

        }
        else{
        echo '<div class="container">
            <div class="lead">
                You are not logged in . Please log in to start a discussion;
            </div>
        </div>';
        }
        ?>




        <div class="container my-3">







            <h1 class="my-4">Browse Questions</h1>
            <?php
        $sql_query = "SELECT * FROM `threads` WHERE `thread_cat_id` = '$id' ";
        $result = mysqli_query($connection,$sql_query);
        if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $description = $row['thread_description'];
            $thread_time = $row['created'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "select user_email from `users` where `sno` = '$thread_user_id'";
            $result2 = mysqli_query($connection,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            echo   ' <div class="media my-3">
            <img src="img/user.jpg" width="64px" height="64px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-3">'.$row2['user_email'].' at '.$row['created'].'</p>
                <h5 class="mt-0"><a href="thread.php?threadid='.$id.'">'.$title.'</h5></a>
                '.$description.'
            </div>
        </div>';
    }}
    else{
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No results found</h1>
          <p class="lead">Be the first person to ask question.</p>
        </div>
      </div>';
    }
    ?>


        </div>

        <?php 
    include 'partials/_footer.php';
    ?>

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
</body>

</html>