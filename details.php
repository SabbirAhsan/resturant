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
    <title>Restaurent Details</title>
    <style type="text/css">
      .main-box{
        padding: 30px 0px;
      }
      .box-1 img{
        border: 5px solid white;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px gray;
        width: 500px;
        height: 300px;
        float: right;
      }
      .box-2{
        padding-top: 30px;
      }
      .box-2 span{
        font-size: 24px;
        color:green;
        text-decoration: underline;
      }
      .box-2 p{
        font-size: 24px;
        color: black;
      }
      .box-3{
        padding: 20px 0px;
      }
      .box-3 h1{
        text-align: center;
      }
    </style>
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
  <a class="navbar-brand"  href="dash.php">Restaurent Review System</a>
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

<div class="container main-box">
    <div class="row">  
        <div class="col-md-12 box-3">
          <h1>Restaurent Details</h1>
        </div>
        <div class="col-md-6 box-1">
            <?php
              include_once("connection.php");
                 if(isset($_GET['details'])){
                   $sql= "SELECT S.image,S.resname,S.resadd,S.rescity,S.resdes FROM addres S WHERE id='{$_GET['id']}'"; 
                      $rim= mysqli_query($conn,$sql);
                   while ($res = mysqli_fetch_array($rim)) {

               echo '  
                    <img height:150px;" class="im45 img-responsive" src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="400" width="450" class="img-thumnail" />  '; 
              ?>
        </div>
        <div class="col-md-6 box-2">
            <p><span>Restaurent Name:</span> <?php echo $res['resname'];  ?></p>
            <p><span>Restaurent Address:</span> <?php echo $res['resadd'];  ?></p>
            <p><span>Restaurent City:</span> <?php echo $res['rescity'];  ?></p>
            <p><span>Restaurent Details:</span> <?php echo $res['resdes'];  ?></p>
        </div>
    </div>
</div>

<?php
         
    }
    

    }
?>


</body>
</html>