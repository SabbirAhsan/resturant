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
    <title>Document</title>
</head>
<body>
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
  <a class="navbar-brand"  href="dash.php">Restaurent</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
     
   
     
      
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
          
    </ul>
    
    
  </div>  
</nav>
  

<?php
include_once("connection.php");
                
          



    if(isset($_GET['details'])){
     $sql= "SELECT S.image,S.resname FROM addres S WHERE id='{$_GET['id']}'"; 
        $rim= mysqli_query($conn,$sql);
        
 
    while ($res = mysqli_fetch_array($rim)) {

 echo '  
                           
                                 
                                    <img height:150px;" class="im45 img-responsive" src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="400" width="450" class="img-thumnail" />  
                                
                            
                     '; 
        
        ?>
        <br>
        <p><?php echo $res['resname'];  ?></p>
        
            
        <?php
         
            
            
        
   
           
      }
    

    }
?>


</body>
</html>