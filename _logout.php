<?php
    session_start();  
    echo "Loggingin you out. Please wait...";
     
    session_destroy();
    header("Location: /QnA")
    
?>