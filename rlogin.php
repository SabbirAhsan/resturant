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
        .c1{
        margin-top: 8%;
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
   <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand"  href="index.html">RRS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       Sign Up
      </a>
      <div class="dropdown-menu">
       <a class="dropdown-item" href="usignup.php">User Sign Up</a>
       <a class="dropdown-item" href="rsignup.php" >Owner Sign Up</a>
       
     

      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       Login
      </a>
      <div class="dropdown-menu">
       <a class="dropdown-item" href="ulogin.php" >User Login</a>
       <a class="dropdown-item" href="rlogin.php" >Owner Login</a>
       
     

      </div>
    </li>
     
      
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
          
    </ul>
    
    
  </div>  
</nav>
    
    
    
    <div class="c1 container">
      <div class="row">
          <div class="col-md-8">
              <form method="post">
              <div class="im1">
                  <img class="img-responsive" src="./imgs/admin-login-images-png-4.png" style="height:100px; width:100px;"> 
                  <br>
                  <h3>Owner Login</h3> 
              </div>
            
              
  
  <div class="form-group">

    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" name="username">
  </div>
  
  <div class="form-group">
  
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
 
 
 <br>
  <button type="submit" name="sub" class="btn btn-primary">Submit</button>
</form>

          </div>
          <div class="s2 col-md-4">
             <div class="v2">
              <h1>Please Login for add your food.</h1>
              <h4>Please enter your valid information</h4>
              <h4>Dont Share your personal information</h4>
              </div>
          </div>
      </div>
  </div>
  
  <?php
        include_once("connection.php");
        
        session_start();
        
        if(isset($_POST['sub'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
           
            
            $sql = "SELECT username,password FROM rsignup
                           WHERE username='$user' AND password='$pass'";
            
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            
            if($count == 1){
                $_SESSION['ruser']=$user;
               
                  
               
                header('location: admindash.php');
            }
            
            else{
               echo"<script>swal({
                    title: 'Username or Password is Incorrect',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,

                });</script>";
            }
            
        }
        
        
        
        
        ?>
</body>
</html>