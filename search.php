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

    <div class="container">
        <ul class="list-unstyled">
            <?php    
        $query = $_GET["search_query"];
        echo '<h1 class="text-center my-5"> Search results for <em>" '.$query.' "</em> </h1>';
        $sql_query = "SELECT * FROM `threads` WHERE match (thread_title, thread_description) against ('$query')";
        $result = mysqli_query($connection, $sql_query);
            if (mysqli_num_rows($result) > 0 ){
              
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['thread_title'];
                    $desc = $row['thread_description'];
                    $id = $row['thread_id'];
                    echo '<li class="media my-4">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1"><a href="thread.php?threadid='.$id.'">'.$row['thread_title'].'</a></h5>
                        '.$row['thread_description'].'
                    </div>
                </li>';
            
        }
    }
            else{
                echo'<div class="jumbotron jumbotron-fluid my-5">
                <div class="container">
                  <h1 class="display-4">No results found!</h1>
                  <p class="lead">Suggestions:</p>
                  <ul>
                   <li> Make sure that all words are spelled correctly.</li>
                   <li>Try different keywords.</li>
                   <li>Try more general keywords.</li>
                    </ul>
                </div>
              </div>';
            }

    
        
            ?>
        </ul>





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