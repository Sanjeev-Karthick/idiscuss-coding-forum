<?php 

session_start();
include '_dbconnect.php'
;


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/codingforum/"> iDiscuss </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/codingforum/">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  
        Top Catgories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($connection,$sql);
 
      while($row = mysqli_fetch_assoc($result)){
        $id = $row["category_id"];
        echo '<a class="dropdown-item" href="/codingforum/threadlist.php?catid='.$id.'">'.$row['category_name'].'</a>';

      }
        
    


      echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="contact.php" tabindex="-1" > Contact us</a>
    </li>
  </ul>
  <div class="mx-2">';
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
    echo '<form class="form-inline my-2 my-lg-0" method="GET" action ="/codingforum/search.php">
    <input class="form-control mr-sm-2" type="search" name ="search_query" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    <p class = "text-light my-0 mx-2"> Welcome '.$_SESSION['useremail'].' </p>
    <a class="btn  btn-outline-success" href="partials/_logout.php" >Log out</a>
  </form>';

  }
  else{
    echo '<div class="row"><form class="form-inline my-2 my-lg-0 mx-5" method="GET" action ="/codingforum/search.php">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name ="search_query">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button class="btn  btn-outline-success mx-2 form-inline"  data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn   btn-outline-success form-inline"  data-toggle="modal" data-target="#signupModal">Signup</button> </row> ';


  }

  echo'</div>
  </div>
  
  </nav>';
  

include "_loginmodal.php";
include "_signupmodal.php";


if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Succcess!</strong> You can now log in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';

}
else if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false") {
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Passwords do not match. Try with another password.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';


}

?>