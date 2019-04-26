<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="nav.css">
    <title>Document</title>
    <style>
        .a1 {
            text-decoration: none !important;
        }

        .a1:hover {
            color: limegreen;
        }

        .m1 {
            box-shadow: none !important;


        }

        .m1:hover {
            color: deepskyblue !important;
        }
        .col-md-4{
            margin: 0;
            padding: 0;
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
            <a class="navbar-brand" href="dash.php">Restaurent</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">




                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>

                </ul>
                  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" style="color: white;">Search</button>
    </form>


            </div>
        </nav>



        <div class="container-fluid">

            <div class="card-deck" id="cad">



                <?php
   
    include_once("connection.php");
    
    
 

  
    $sql = "select  S.image, S.resname, S.resdes, S.id FROM addres S";
      $rim = mysqli_query($conn,$sql);

    
   
    
    while ($res = mysqli_fetch_array($rim)) {
       
        
        
        $tql = "select s.id, cast(AVG(rating )as decimal(10,1)) FROM rating,addres s  WHERE s.id=resid AND s.id='{$res['id']}' " ;
    $tim = mysqli_query($conn,$tql);
             while ($tes = mysqli_fetch_array($tim)) {

       
             
        ?>
                    <div class="col-md-3">
                        <div class="card" style="margin-top:3%;">
                            <div class="r1">
                                <div class="rati">




                                </div>
                                <h3 style="color:#ff6680; margin-left:3%;">
                                    <?php echo $res['resname'];?>
                                    <a style="float:right; font-size:17px; color: salmon;">
                                        <?php echo $tes['cast(AVG(rating )as decimal(10,1))']; ?> <i style="color:#00cc66;" class='fas fa-star'></i></a>
                                </h3>










                            </div>
                            <?php echo'
               <img style="height:250px; width:auto;"  src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="100" width="150" class="img-responsive" />  
     ';
    ?>
                            <div class="card-body">
                                <h5 class="card-title">Moto</h5>
                                <p class="card-text">
                                    <?php echo $res['resdes'];?>
                                </p>




                                <div class="row">
                                    <div class="col-md-8">
                                        <a class="a1" href="rating.php?ratingo=1&id=<?php echo $res['id']; ?>">
     <i class='far fa-star'></i>
     </a>

                                        <br>

                                        <a class="a1" href="rating.php?ratingt=1&id=<?php echo $res['id']; ?>">
   <i class='far fa-star'></i>
     <i class='far fa-star'></i>  
     </a>
                                        <br>

                                        <a class="a1" href="rating.php?ratingh=1&id=<?php echo $res['id']; ?>">
   <i class='far fa-star'></i>
   <i class='far fa-star'></i>
   <i class='far fa-star'></i>                           
    </a>

                                        <br>

                                        <a class="a1" href="rating.php?ratingf=1&id=<?php echo $res['id']; ?>">
  <i class='far fa-star'></i>
  <i class='far fa-star'></i>
  <i class='far fa-star'></i>
  <i class='far fa-star'></i>
  </a>
                                        <br>

                                        <a class="a1" href="rating.php?ratingfi=1&id=<?php echo $res['id']; ?>">
    <i class='far fa-star'></i>
    <i class='far fa-star'></i>
    <i class='far fa-star'></i>
    <i class='far fa-star'></i>
      <i class='far fa-star'></i>
      </a>
                                    </div>
                                    <div class="col-md-4">

                                        <a style="float: right;" href="comm.php?details=1&id=<?php echo $res['id']; ?>">  Comments</a>
                                        <a style="float:right;" href="details.php?details=1&id=<?php echo $res['id']; ?>">Details</a>

                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>



                    <?php
         
            
            
        
             }
         
    }
    

      
?>


            </div>
        </div>

</body>

</html>