<?php
 
     
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "petshop";
        
        $conn = mysqli_connect($hostname,$username,$password,$database) or die("Database connection failed");
     

?>