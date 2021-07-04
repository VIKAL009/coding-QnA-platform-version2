<?php
   if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
    echo '<div class="container">
    <h1 class="py-2">Post a Comment</h1>
    <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Type your comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Post comment</button>
    </form>
</div>';
   }
   else{
       echo '<div class="container">
       <h1 class="py-2">Post a Comment</h1>
       <p class="lead">You are not logged in. Please login to be able to post Comment</p>
       </div>';
       
   }
?>

