<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link rel="stylesheet" href="nav.css">
    <title>Document</title>
    <style>
    .c11{
        margin-top: 5%;
    }
    
    .s2{
        border: 1px solid deepskyblue;
         border-radius: 10px;
        background-color: #f2f2f2;
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px deepskyblue;
        
        
    }
    
    .v2{
        text-align: center;
        margin-top: 25px;
    }
    .im1{
       text-align: center;
    }
    .form-control{
        border:none;
        border-bottom: 2px solid green;
        border-radius: 0px;
    }
    .form-control:focus {
  border-color: deepskyblue;
  box-shadow: none;
}
         @media only screen and (max-width:767px){
            .s2{
                display: none;
            }
        }
    
    </style>
</head>
<body>
   <?php
    session_start();
   
    
    
    $use = $_SESSION['ruser'];

 
    
    if($use == true){
        
    }
    
  
    else{
        header("location: rlogin.php");
    }
    
    
   
    

      
?>
   <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand"  href="index.html">Restaurent</a>
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
  <?php

ini_set( "display_errors", 0); 
        ?>

   
   <div class="c11 container">
      <div class="row">
          <div class="col-md-8">
              <form method="post" enctype="multipart/form-data">
        

  
  
  <div class="form-group">

    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Restaurant Name" name="resname">
    
  </div>
  <div class="form-group">

    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Restaurant Address" name="resadd">
    
  </div>
  <div class="form-group">

    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Restaurant City" name="rescity">
    
  </div>
  <div class="form-group">

    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Restaurant Description" name="resdes">
    
  </div>
  <div class="from-group">
   <img src="" id="image" style="display:none;" height="150" width="100">
   <label>Enter Your Image</label><br>
    <input name="img" onchange="showImage.call(this)" type="file" />  
  </div>
 
  
  
 
 <br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

          </div>
         
      </div>
  </div>
     <script type="text/javascript">
    
    function showImage(){
        if(this.files && this.files[0]){
            var obj = new FileReader();
            obj.onload = function(data){
                var image = document.getElementById("image");
                image.src = data.target.result;
                image.style.display = "block";
            }
            
            obj.readAsDataURL(this.files[0]);
        }
    }
    
    </script>
      <?php
        include_once("connection.php");
        
     


        
        if(isset($_POST['submit'])){
            
        $resname = $_POST['resname'];
        $resadd = $_POST['resadd'];
        $rescity = $_POST['rescity'];
        $resdes = $_POST['resdes'];
      $use = $_SESSION['user_name'];

            
            
             
            $filename = addslashes($_FILES['img']['name']);
$tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
$filetype = addslashes($_FILES['img']['type']);
$filesize = addslashes($_FILES['img']['size']);
$array = array('jpg','jpeg');
$ext = pathinfo($filename, PATHINFO_EXTENSION);
            
            
            
            
            $sql = "INSERT INTO addres(username,resname,resadd,rescity,resdes,name,image)
                                VALUES('$use','$resname','$resadd','$rescity','$resdes','$filename','$tmpname')";
      
                 if(empty($resname) || empty($resadd) || empty($rescity) || empty($resdes)|| empty($filename) || !in_array($ext, $array)){
                echo"<script>swal({
                    title: 'Fill Up All Field',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,

                });</script>";
            }
           
            elseif(!$res = mysqli_query($conn,$sql)){
                echo"<script>swal({
                    title: 'Do Not Add Ones More Retaurant',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,

                });</script>";
            }

          
            else{
                $res = mysqli_query($conn,$sql);
             
              
                echo"<script>swal({
                    title: 'Your Information Added Successfully',
                    text: 'Thank You',
                    icon: 'success',
                    timer: 3000,
                    button: false,

                });</script>";
            }

            
        }

      
        ?>

    
</body>
</html>