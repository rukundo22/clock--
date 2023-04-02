<?php 
$firstName=$lastName=$telephone=$email=$city=$village=$clientsViews=$techrequest='';
$errors= array('firstName' => '', 'lastName'=>'', 'telephone'=>'', 'email'=>'','city'=>'' ,'village'=>'', 'clientsViews'=>'','techrequest'=>'');
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

   //check inquiry
   if(empty($_POST['techrequest'])){
    $errors['techrequest'] = ' description of the problem is required';
   }else{
    $techrequest=$_POST['techrequest'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $techrequest)){
        $errors['techrequest'] =  'description must be letters and spaces only';
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
               <div class=" mt-2 mt-lg-4 b-lg-2  text-center h4 colorcompanyname  justify-content-center align-content-center " id="indexlogoname" ><p >clockwave innovations and<br> technical solutions ltd</p></div>
         
         </div>
     
     <!-- end pf log / start of clients welcome.-->
     <div class=" row container">
         <div class="divname text-center m-0 col"><p class="clientsname">Welcome clients name</p></div>
         <div class=" text-end h5 col" >
                     <a  href="careers.php" class="links"> <button class="afterlgout rounded">Log Out</button></a>
         </div>
                   
        </div>



        <!--navigation section-->
        <div class="container bt-2 bb-2 my-3 mx-0  d-flex flex-row  justify-content-start  navigation" >
         <nav class="navbar navbar-expand-lg bg-lightgrey ">
           <div class="container-fluid ">
               
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: blue; color:white;">
                 <span class="navbar-toggler-icon "></span><br>
                 <span>account</span>
               </button>
 
               <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav row">
                 <BR>
                   <li class="nav-item m-lg-3 b--lg-2 h5 col ">
                    <a href="afterorders.php" class="links "><button class="afterlnks rounded">Orders</button></a>
                   </li>
                   <li class="nav-item m-lg-3 b-lg-2  h5 col" >
                    <a  href="afterinvoices.php" class="links"><button class="afterlnks rounded">Invoices</button></a>
                   </li>
                   <li class="nav-item m-lg-3 b-lg-2 h5 col" >
                     <a  href="afterpoints.php" class="links"><button class="afterlnks rounded">Points</button></a>
                   </li> 
                   <li class="nav-item m-lg-3 b-lg-2 h5 col" >
                     <a  href="afterassignedstaff.php" class="links"><button class="afterlnks rounded">Assigned staff</button></a>
                   </li>
                   <li class="nav-item m-lg-3 b-lg-2 h5 col"><a href="afterproperty.php" class="links"><button class="afterlnks rounded">Your properties</button></a></li>
                   

                </ul>
              </div>
           </div>
             
         </nav>
         </div>
         <!--end of nav-->


          <!--quick access-->
         
       <div class=" bigWcatego text-center container" id="categolist">
        <p>
        
        <span class="m-3 fs-5" style="color:darkmagenta;" id="indexlogoname">quick access:</span>
         <a href="#" class="catego rounded-pill"><i class="bi bi-cart3"></i>shop</a>
        
         <a href="#" class="catego rounded-pill"><i class="bi bi-shop-window"></i> auctions</a>
         
         <a href="#" class="catego rounded-pill"> <i class="bi bi-houses"></i> Rental property</a>
          
         </p>
      </div>

         <!-- end of quick access-->
       
        <!-- featured products-->
        
        <div class="mt-3 fs-4 text-center" style="color:darkmagenta;" id="indexlogoname"><p>Featured items</p> <i class="bi bi-arrow-down-circle"></i></div>
         
        <div id="carouselExampleSlidesOnly" class="carousel slide " data-bs-ride="carousel">
  <div class="carousel-inner ">
    <div class="carousel-item active  ">
      <img src="shop.jpg" class="d-block w-10 afterimage afterslide2" alt="...">
      <p class="prodtdis text-center h6">hello item</p>
    </div>
    <div class="carousel-item">
      <img src="shop.jpg" class="d-block w-10 afterimage" alt="...">
    </div>
    <div class="carousel-item">
      <img src="shop.jpg" class="d-block w-10 afterimage" alt="...">
    </div>
  </div>
</div>
<!--end of slide for featured items-->

          <!--sercive request-->

  <div class=" inquiryform container">
         <div class="m-2  text-center " style="color:green; font-weight:bold;font-size:larger;">Need a Technician? fill in details below
         </div>

       <form name="technician_request" action="afterlogin.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" class="m-2 form1 rounded" enctype="multipart/form-data">

       
       
       <!--hidden input fields-->
       <input type="hidden" class="form-control m-2" placeholder=" " aria-label=" user name" name="userName" value="<?php echo htmlspecialchars($userName) ; ?>" required>
       
       <input type="hidden" class="form-control m-2" placeholder="" aria-label=" user Id" name="userId" value="<?php echo htmlspecialchars($userId) ; ?>" required>
          
        
       <input class="form-control m-2" type="hidden" name="telephone" placeholder="" value="<?php echo htmlspecialchars($telephone) ; ?>" required>
       <!-- end of hidden input fields-->

       <div class="">
        <label>What is the problem? </label>
          <textarea required name="techrequest" class="form-control m-2" ><?php echo htmlspecialchars($techrequest) ; ?></textarea>
          <div class="text-danger"><?php echo $errors['techrequest']; ?></div>
        </div>

        <label for="visitation time">When would you like our technician to come?</label>
          <div class="row m-1 justify-content-evenly" id="flexform">
            <div class=" col">
              <p>Date</p>     
              <input type="date" class="form-control" name="visitDate" required>
            </div>
            <div class=" col">
              <p>Time</p>
              <input type="time" class="form-control" name="visitTime" required>
            </div>
          </div>

          <div class="text-center"><input class="m-2 btnq rounded-pill " type="submit" value="submit" name="submit" >
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
      
      </div>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <footer>
    <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center " style="background-image: url(careerbgimg.JPG);"><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
   
  </footer>
  </html>