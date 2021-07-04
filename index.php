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
    #ques {
        min-height: 433px;
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
                      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search..." aria-label="Search">
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
                      // <!-- <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#LoginModal">Login</button>
                       // <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#SignUpModal">SignUp</button>-->
                        
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
    <!-- Login Modal -->
    <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login to QnA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="_handleLogin.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="loginEmail">Username</label>
                            <input type="text" class="form-control" id="loginEmail" name="loginEmail"
                                aria-describedby="emailHelp">

                        </div>
                        <div class="form-group">
                            <label for="loginPass">Password</label>
                            <input type="password" class="form-control" id="loginPass" name="loginPass">
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <!--SignUp Modal -->
    <div class="modal fade" id="SignUpModal" tabindex="-1" aria-labelledby="SignUpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Get a QnA Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="_handleSignup.php" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="signupEmail" name="signupEmail"
                                aria-describedby="emailHelp">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                        </div>
                        <div class="form-group">
                            <label for="cexampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                        </div>

                        <button type="submit" class="btn btn-primary">Signup</button>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>












    <?php include '_dbconnect.php';?>


    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="a1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Welcome to programming world</h2>
                    <p>
                    <h3>QnA </h3>
                    </p>
                    <button class="btn btn-danger">Tutorials</button>
                    <button class="btn btn-success">Questions</button>
                    <button class="btn btn-primary">Answers</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="a2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Welcome to programming world</h2>

                    <p>
                    <h3>QnA </h3>
                    </p>
                    <button class="btn btn-danger">Tutorials</button>
                    <button class="btn btn-success">Questions</button>
                    <button class="btn btn-primary">Answers</button>

                </div>
            </div>
            <div class="carousel-item">
                <img src="a3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Welcome to programming world</h2>

                    <p>
                    <h3>QnA </h3>
                    </p>
                    <button class="btn btn-danger">Tutorials</button>
                    <button class="btn btn-success">Questions</button>
                    <button class="btn btn-primary">Answers</button>

                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container my-4" id="ques">
        <h2 class="text-center my-3"> QnA-Categories</h2>

        <div class="row my-3">

            <?php 
   $sql = "SELECT * FROM `categories`";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    //echo $row['category_id'];
    //echo $row['category_name'];
    $id = $row['category_id'];
    $cat = $row['category_name'];
    $desc = $row['category_description'];
    echo '  <div class="col-md-4 my-2">
            <div class="card" style="width: 18rem;">
                <img src="'.$id.'.jpg" class="card-img-top" alt="image for this category" width="60%" height="250px">
                <div class="card-body">
                    <p class="card-text">'.substr($desc,0,80).'.....</p>
                    <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">'.$cat.'</a>
                </div>
            </div>
        </div>';
   }
?>

        </div>
    </div>









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