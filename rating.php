<?php
include_once("connection.php");
                
          
                        session_start();
            $use = $_SESSION['user_name'];
          
    if($use == true){
        
    }
    
  
    else{
        header("location: login.php");
    }


    if(isset($_GET['ratingo'])){
      $sql= "INSERT INTO rating(username,resid,rating)
                    VALUES('$use',".$_GET['id'].",1)"; 
        $rim= mysqli_query($conn,$sql);
        
        if($rim){
            header('Refresh:0; dash.php');
        }
    }
 if(isset($_GET['ratingt'])){
      $sql= "INSERT INTO rating(username,resid,rating)
                    VALUES('$use',".$_GET['id'].",2)"; 
        $rim= mysqli_query($conn,$sql);
        
        if($rim){
            header('Refresh:0; dash.php');
        }
    }
 if(isset($_GET['ratingh'])){
      $sql= "INSERT INTO rating(username,resid,rating)
                    VALUES('$use',".$_GET['id'].",3)"; 
        $rim= mysqli_query($conn,$sql);
        
        if($rim){
            header('Refresh:0; dash.php');
        }
     
    }
 if(isset($_GET['ratingf'])){
      $sql= "INSERT INTO rating(username,resid,rating)
                    VALUES('$use',".$_GET['id'].",4)"; 
        $rim= mysqli_query($conn,$sql);
        
        if($rim){
            header('Refresh:0; dash.php');
        }
     
    }
 if(isset($_GET['ratingfi'])){
      $sql= "INSERT INTO rating(username,resid,rating)
                    VALUES('$use',".$_GET['id'].",5)"; 
        $rim= mysqli_query($conn,$sql);
        
        if($rim){
            header('Refresh:0; dash.php');
        }
     
    }


?>
