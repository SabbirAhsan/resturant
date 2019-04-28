<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="nav.css">
    <title>Restaurent Comments</title>
    <style>
        .com1{
            border-bottom: 2px solid red;
            padding: 10px 0px;
            width: 500px;
            margin: 10px auto;
        }
        
        .l1{
            font-size: 22px; 
            font-weight: bold;
            color: green;
        }
        .f1{
          padding: 20px 0px;
        }
        .box{
          padding: 20px 0px;
          text-align: center;
        }
        .im45{
            width: 100%;
            border: 5px solid white;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px gray;\
        }
        .form-control {
            padding: 5px !important;
        }
    </style>
</head>
<body>
   <?php

ini_set( "display_errors", 0); 
        ?>
    <?php
    session_start();
   
    
    
    $use = $_SESSION['user_name'];

 
    
    if($use == true){
        
    }
    
  
    else{
        header("location: ulogin.php");
    }
    
    
   
    

      
?>


   <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand"  href="dash.php">Restaurent Review System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
     
   
     <li class="nav-item">
        <a class="nav-link" href="dash.php">Restaurants</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
          
    </ul>
    
    
  </div>  
</nav>
  
<div class=" con3 container">
  <div class="row">
    <div class="col-md-12 box">
      <h1>Users Comments</h1>
    </div>
    <div class="col-md-6 box-1">
   

<?php
include_once("connection.php");
                
          



    if(isset($_GET['details'])){
     $sql= "SELECT S.id,S.image,S.resname FROM addres S WHERE id='{$_GET['id']}'"; 
        $rim= mysqli_query($conn,$sql);
        
 
    while ($res = mysqli_fetch_array($rim)) {

 echo '  
                           
                                 
                                    <img  class="im45 img-responsive" src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="300" width="350" />  
                                
                            
                     '; 
        
        ?>
        <br>
        <div class="f1">
          <div class="col-md-12">
            <h3 style="text-align:left; color: salmon;"><?php echo $res['resname'];  ?></h3><br>
          </div>
          <div class="col-md-3" style="float: left;">
            <h4>Comment: </h4>
          </div>
          <div class="col-md-9" style="float: right">
            <form method="post">
              <div class="form-group">
                  <input type="text" class="form-control" name="comments">
                  <button type="submit" name="sub" class="btn btn-primary" style="margin: 10px 0px;">Send</button>
              </div>
            <?php
            include_once("connection.php");         
            $use = $_SESSION['user_name']; 
            
                     if(isset($_POST['sub'])){
                        $comments = $_POST['comments'];
                         $cql = "INSERT INTO comments(username,resid,comments)
                                         VALUES('$use','{$res['id']}','$comments')";
                         $tql = mysqli_query($conn,$cql);
                         
                         if($tql){
                              header('Refresh:0; comm.php');
                         }
                     }
                ?>
            </form>
          </div>
          </div>
          </div>
          <div class="col-md-6">
        
        <div class="div1">
            <?php
            
            include_once("connection.php");
             
           $pql = "SELECT username,comments FROM comments WHERE resid='{$res['id']}' ORDER BY comments DESC";
           $klm = mysqli_query($conn,$pql);
                
            
            while ($nes = mysqli_fetch_array($klm)) {
            
            ?>
            <div class="com1">
             <label class="l1"><?php echo $nes['username']; ?> </label> 
              <p><?php echo $nes['comments']; ?></p>  
            </div>
            
            <?php
                
                
            }
        
        
            ?>
            
            
        </div>
        
            
        <?php
         
            
            
        
   
           
      }
    

    }
?>
</div>
</div>
</div>  
  
 
</body>
</html>