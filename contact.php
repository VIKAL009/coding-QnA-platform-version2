<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Welcome to Coding-QnA</title>
    <style>
      .container{
          min-height: 85vh;
      }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">QnA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/QnA/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/QnA/about.php">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/QnA/contact.php">Contact Us</a>
                </li>
               
            </ul>
        
        </div>
    </nav>

    <div class="container my-4">
        <h2>Contact Us</h2>
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Your Query</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>C<Canvas></Canvas></option>
                    <option>C++</option>
                    <option>java</option>
                    <option>Data Structures</option>
                    <option>Others</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Are you a Student?</div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck2">
                        <label class="form-check-label" for="gridCheck2">
                            Yes
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Are you a Tutor?</div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck3">
                        <label class="form-check-label" for="gridCheck3">
                            Yes
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Tell us About yourself :</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea2">Elaborate Your Concern :</label>
                <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
            </div>

            <buttom class="btn btn-primary">submit</buttom>
        </form>
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