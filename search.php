<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
    
    #maincontainer {
        min-height: 85vh;
    }
    </style>
    <title>Welcome to Coding-QnA</title>
</head>

<body>

    <?php include '_dbconnect.php';?>
    <?php
  session_start();
   echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/QnA/">QnA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/QnA/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/QnA/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/QnA/contact.php">Contact Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">';


                        $sql = "SELECT category_name, category_id FROM `categories`";
                        $result = mysqli_query($conn, $sql);
                        $noResult = true;
                        while($row = mysqli_fetch_assoc($result)){
                           echo  '<a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>
                        <div class="dropdown-divider"></div>';
                        }
              echo  '</li>

            </ul>';
            
                  if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){ 

                      echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      <p class="text-light my-0 mx-2">Welcome '.$_SESSION['useremail'].'</p>
                      <a href="_logout.php" class="btn btn-outline-success ml-2" >Logout</a>
                  </form>';
                  }
                  else{

                     echo ' <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>       
                         </form>
                         <div class="mx-2">
                         <button class="btn btn-danger" data-toggle="modal" data-target="#LoginModal">Login</button>
                         <button class="btn btn-danger" data-toggle="modal" data-target="#SignUpModal">SignUp</button>';
                    
                        
                  }
                   echo '</div>
                       </div>
                 </nav>';

                if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
                    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>success!</strong> You can now login! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    ';
                }
 ?>



    <div class="container my-3" id="maincontainer">
        <h1 class="py-3">Search results for <em>"<?php echo $_GET['search']?>"</em></h1>
        <?php
      $noResults=true;
      $query = $_GET["search"];     
 $sql = "select * from threads where match (thread_title, thread_desc) against('$query')";
 $result = mysqli_query($conn, $sql);
 
 while($row = mysqli_fetch_assoc($result)){
   
     $title = $row['thread_title'];
     $desc = $row['thread_desc'];   
     $thread_id= $row['thread_id'];
     $url = "thread.php?threadid=".$thread_id;
     $noResults = false;
    echo  '<div class="result">
             <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
             <p>'.$desc.'</p>
           </div>';
 }
 if($noResults){
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-4">No Results Found</p>
      <p class="lead"><b>
      Suggestions:<ul>
      <li>Make sure that all words are spelled correctly.</li>
      <li>Try different keywords.</li>
      <li>Try more general keywords.</li>
      <li>Try fewer keywords.</b></p></li></ul>
    </div>
  </div>';
}
 ?>
      















    <footer class="container-fluid bg-dark text-light">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p class="text-center mb-0">Copyright © 2020-2021 QnA, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a>
        </p>
    </footer>
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