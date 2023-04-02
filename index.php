<?php 
$firstName=$lastName=$telephone=$email=$city=$village=$clientsViews='';
$errors= array('firstName' => '', 'lastName'=>'', 'telephone'=>'', 'email'=>'','city'=>'' ,'village'=>'', 'clientsViews'=>'');
if(isset($_POST['submit'])){
   
    //check first-name
   if(empty($_POST['firstName'])){
    $errors['firstName'] = ' An first name is required';
   }else{
    $firstName=$_POST['firstName'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $firstName)){
     $errors['firstName'] = ' name must be letters and spaces only';
    }
   }

   //check last-name
   if(empty($_POST['lastName'])){
    $errors['lastName'] = ' An last name is required';
   }else{
    $lastName=$_POST['lastName'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $lastName)){
        $errors['lastName'] =  'name must be letters and spaces only';
    }
   }

   //check telephone
   if(empty($_POST['telephone'])){
    $errors['telephone'] = ' telephone number is required';
   }else{
    $telephone=$_POST['telephone'];
    if(!preg_match('/^[0-9\s]+$/' , $telephone)){
        $errors['telephone'] =  'invalid telephone number';
    }
   }
   //check email
   if(empty($_POST['email'])){
    $errors['email'] = 'An email is required';
   }else{
    $email=$_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] =  'email must be a valid email address';
    }
   }

   //check city/districts
   if(empty($_POST['city'])){
    $errors['city'] = ' city/district is required';
   }else{
    $city=$_POST['city'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $city)){
        $errors['city'] =  'city/district must be letters and spaces only';
    }
   }

   //check village
   if(empty($_POST['village'])){
    $errors['village'] = ' village name is required';
   }else{
    $village=$_POST['village'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $village)){
        $errors['village'] = 'village must be letters and spaces only';
    }
   }

   //check inquiry
   if(empty($_POST['clientsViews'])){
    $errors['clientsViews'] = ' description of the problem is required';
   }else{
    $clientsViews=$_POST['clientsViews'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $clientsViews)){
        $errors['clientsViews'] =  'description must be letters and spaces only';
    }
   }
   //checking for all errors.
   if (array_filter($errors)){

   }else{
    header('location:requestsub.php');
   }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>www.clockwaveits.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="clockwave.css" rel="stylesheet">
    <link href="clockwave22.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body class="mt-4 ">
         <!-- logo and name -->
        <div class="container border-1 my-2  d-flex flex-row   justify-content-center"> 
               
              <img class=" logo rounded-circle m-2 col-4 " src="logo.JPG" alt="logo" id="" >
              <div class=" m-2 mt-lg-4 b-lg-2  text-center h4 colorcompanyname  justify-content-center align-content-center " id="indexlogoname" ><p >clockwave innovations and <br>technical solutions ltd</p></div>
        
        </div>
        <!--navigation section-->
        <div class="container bt-2 bb-2 my-2 mx-0  d-flex flex-row  justify-content-end  navigation" >
        <nav class="navbar navbar-expand-lg bg-darkgray ">
          <div class="container-fluid ">
              
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: darkmagenta; color:white;">
                <span class="navbar-toggler-icon "></span><br>
                <span>Menu</span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav row">
                  <li class="nav-item m-lg-3 b--lg-2 h5 col ">
                   <a href="index.php" class="links"><br><i class="bi bi-house-fill"></i>  home</a>
                  </li>
                  <li class="nav-item m-lg-3 b-lg-2  h5 col" >
                   <a  href="shop.php" class="links"><i class="bi bi-cart3"></i><br>shop</a>
                  </li>
                  <li class="nav-item m-lg-3 b-lg-2 h5 col" >
                    <a  href="auctions.php" class="links"><i class="bi bi-shop-window"></i> auctions</a>
                  </li> 
                  <li class="nav-item m-lg-3 b-lg-2 h5 col" >
                    <a  href="services.php" class="links"><i class="bi bi-gear"></i> services</a>
                  </li>
                  <li class="nav-item m-lg-3 b-lg-2 h5 col" >
                    <a  href="careers.php" class="links"><i class="bi bi-mortarboard-fill"></i> careers</a>
                  </li>
                  <li class="nav-item m-lg-3 b-lg-2 h5 col"><a href="rental-property.php" class="links"> <i class="bi bi-houses"></i> Rental property</a></li><li class="col"></li>
               </ul>
             </div>
          </div>
            
        </nav>
        </div>
        <!--clients login section-->
        
        <div class="container my-5  mx-0 row  justify-content-evenly ">
          <div class="col-0 col-lg-2 "></div>
        <div class=" mb-0 col-5 col-lg-3 "> 
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" id="indexclient"><i class="bi bi-person-circle h6" ></i> log in</button>

        <div class="offcanvas offcanvas-start wrapcanvas" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div>
          <button type="button" class="btn-close float-end bg-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    
        </div>
        <div class="offcanvas-body canvasbody">
           <!--form in the top-offcanvas--> 
          <h3 class="canvashead signup m-3" >Sign in</h2>    
          <form class="form-control clientsform" action="action_page.php" method="POST" target="blank" accept-charset="utf-8" autocomplete="off" enctype="multipart/form-data">
            <br>
        <div class="mt-2">
        <div class="m-2">
          <input type="text" class="form-control" placeholder=" Username" aria-label=" Username" required>
        </div>
        <div class="m-2">
          <input type="text" class="form-control" placeholder="Password" aria-label="users password" required>
        </div>
        </div><br>
        <div class=" m-2 row" >
          
          <button type="submit" class="clientsloginbtn  m-0 fw-bold form-control col" style="width:auto">Sign-in</button> 
        
        
          <a class="col" href="">forgot password</a>
        
        </div>
          </form>
        <div class="m-4">
          <p><span class="signin" id="indexclient">Don't have an account?</span>  <a href="signuppage.php" class="fw-bold">signup</a> </p>
        <div class="list">
          <P class="signin">To enjoy:</P>
              <ul class="signin ">
              <li>Great discounts on our various goods and services</li>
              <li>Good customer services</li>
              <li>Free basic maintenance services</li>  
              </ul>
        </div>     
        </div>
        </div>
        </div>
        </div>
        
          <!--new clients sign-in-->
        <div class="mb-0 col-5 col-lg-6 ">
             
              <p class="fw-bold" id="indexclient">  Don't have an account ?<a href="signuppage.php"> signup</a> </p>
        </div></div>

        
        <a href="afterlogin.php" >after</a> <a href="afterstafflogin.php" >staff</a><a href="admin.php" >admin</a>
       <!--image links--> 
        <!-- need for small devices-->
       
       <div class="p-2 m-1   ned2" id="indexlogoname">
          Need:
      </div> 
      <!-- need for large devices-->
    <div class=" flex-container my-0 p-2 bt-0 ms-0 bb-2 justify-content-around align-content-center slidebody fcontain1 ">
       
      <div class="need22 ned"> 
      <div class="p-3 m-4 h3 needstyle " id="indexlogoname">
          Need:
      </div> 
      </div>  

    <div class=" qwee22 text-center "> <div id="slide22">
      
       <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" class="">
      <div class="carousel-inner slidebg">

        <a href="services.html" class="">
      <div class="carousel-item active " data-bs-interval="2000">
        <img src="electrician.JPG" alt="electrical/solar installation and maintenance" class="image d-block ">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="plumber.JPG" alt=" water engineering and all pluming needs." class="image d-block">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="painter.JPG" alt="house painting and interior design" class="image d-block">
      </div> 
      <div class="carousel-item" data-bs-interval="2000">
        <img src="mowing.JPG" alt="lawn mowing, gardening and land scaping" class="image" class="image d-block ">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="cctv.JPG" alt="cctv installation and maintenance" class="image d-block" >
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="carpenter.JPG" alt="carpenter/ wood works" class="image d-block">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="ict.JPG" alt="ICT support services" class="image d-block">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="ac.JPG" alt="air conditioning and refridgeration installation/maintenance" class="image d-block">
      </div>
      </a>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
      </button>
      </div>
       </div>
    </div>
  
    <div class="call22  p-3 my-3" id="">
      <p class="needstyle h3" id="indexlogoname"> call us:</p><p id="indexlogoname"><span class=" fs-4 mtn h4">mtn</span>/<span class="fs-4 airtel h4">airtel</span></p>
      <div class="callus mb-0"> 
        
        <div class="me-1 "><a href="tel:+256783013799" class="" style="text-decoration: none"><button class="call rounded-circle mb-3   d-flex flex-column  justify-content-center align-content-center "> <i class="bi bi-telephone-fill mtn iconsize"></i></button></a></div>
        
        <div class="ms-2"><a href="tel:+256704178632" class="" style="text-decoration: none" ><button class="call rounded-circle mb-3 d-flex flex-column justify-content-center align-content-center "><i class="bi bi-telephone-fill airtel iconsize"></i> </button></a> </div>
      </div>
    </div>
    </div>
    <!--end of image slide large screen-->
  
    <!--end of image links-->
        <br>
    
    <!--inquiry form-->
      <div class="ms-3 me-3 inquiryform">
        <form name="inquiry" action="index.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" class="m-2 form1 rounded" enctype="multipart/form-data">
         <div class="row " id="flexform">
          <div class="col">
            <label for="fname">First name:</label>
            <input type="text" class="form-control m-2" placeholder=" first name" aria-label=" first name" name="firstName" value="<?php echo htmlspecialchars($firstName) ; ?>" required>
            <div class="text-danger"><?php echo $errors['firstName']; ?></div>
          </div>
          <div class="col">
            <label for="Lname">Last name:</label>
            <input type="text" class="form-control m-2" placeholder="last name" aria-label="last name" name="lastName" value="<?php echo htmlspecialchars($lastName) ; ?>" required>
            <div class="text-danger"><?php echo $errors['lastName']; ?></div>
          </div>
          </div>
          <div class=" row" id="flexform">
            <div class="col">
              <label>Phone:</label>
             <input class="form-control m-2" type="tel" name="telephone" placeholder="07******78" value="<?php echo htmlspecialchars($telephone) ; ?>" required>
             <div class="text-danger"><?php echo $errors['telephone']; ?></div>
            </div>
            <div class="col">
              <label>email:</label>
              <input class="form-control m-2" type="email" name="email" placeholder="" value="<?php echo htmlspecialchars($email) ; ?>"  required>
              <div class="text-danger"><?php echo $errors['email']; ?></div>
            </div>
            </div>
        <label>Address:</label> 
        <div class="row" id="flexform">
          <div class="col">
            <input type="text" class="form-control m-2" placeholder="District/city" aria-label="district" name="city" value="<?php echo htmlspecialchars($city) ; ?>" required>
            <div class="text-danger"><?php echo $errors['city']; ?></div>
          </div>
          <div class="col">
            <input type="text" class="form-control m-2" placeholder="village" aria-label="village lived" name="village" value="<?php echo htmlspecialchars($village) ; ?>" required>
            <div class="text-danger"><?php echo $errors['village']; ?></div>
          </div>
          </div>
        <label>inquiry: </label>
          <textarea required name="clientsViews" class="form-control m-2" ><?php echo htmlspecialchars($clientsViews) ; ?></textarea>
          <div class="text-danger"><?php echo $errors['clientsViews']; ?></div>
          <label for="visitation time">when would you like our technician to come?</label>
          <div class="row m-2 justify-content-evenly" id="flexform">
            <div class=" col">
              <p>Date</p>     <input type="date" class="form-control" name="visitDate" required>
            </div>
            <div class=" col">
              <p>Time</p>
              <input type="time" class="form-control" name="visitTime" required>
            </div>
          </div>
        <div class=" d-flex  justify-content-center "> 
          <input class="m-4 btnq rounded-pill" type="submit" value="submit" name="submit" ></input>
          </div>
         </form>
      </div>
         
       <!--footer with useful links-->
     <div class="mb-0 pt-3 ps-5 container-fluid  justify-content-center" style="background-color: lightgreen;" >
       
         <p class="h4 otherlnks ">CONTACT US</p> 
          <div>
           <a href="tel:+256783013799"><i class="bi bi-whatsapp"></i> 0783013799</a>
          </div> 
          <div>
          <a href="tel:+256704178632"><i class="bi bi-telephone"></i> 0704178632</a>
          </div>
          <div>
          <a href="mailto:info@clockwaveits.com"><i class="bi bi-envelope"></i> info@clockwaveits.com</a>
          </div>
          <div>
          <a href="mailto:clockwaveits@gmail.com"><i class="bi bi-envelope"></i> clockwaveits@gmail.com</a>
          </div><br>
        <div class="row justify-content-evenly" id="flexform">
          <p class="h4 otherlnks">other links</p>
          <!--<div class="col"></div> -->
          <div class="col">
           <a href="about.php"> About us</a> 
          </div>
          <div class="col"><br>
            <a href="staff.php" target="_self"><i class="bi bi-people-fill h3"></i>staff/partners </a></div><div class="col"></div>
      </div>
        <br>
          <br>
          
    </div>
     
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
    <footer>
      <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center " style="background-image: url(careerbgimg.JPG);"><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
     
    </footer>
    </html>