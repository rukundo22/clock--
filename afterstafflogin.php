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
               
         
         </div>
     
     <!-- end pf log / start of clients welcome.-->
     <div class=" row container">
         <div class="divname text-center m-0 col"><p class="clientsname">ID</p></div>
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
 
               <div class="collapse navbar-collapse " id="navbarNav">
                 <ul class="navbar-nav row">
                 <BR>
                 <li class="nav-item m-lg-3 b-lg-2 h5 col" >..</li>
                   <li class="nav-item m-lg-3 b--lg-2 h5 col ">
                    <a href="afterstaffticket.php" class="links "><button class="afterlnks rounded">tickets</button></a>
                   </li>
                   <li class="nav-item m-lg-3 b-lg-2  h5 col" >
                    <a  href="afterstaffreports.php" class="links"><button class="afterlnks rounded">reports</button></a>
                   </li>
                   <li class="nav-item m-lg-3 b-lg-2 h5 col" >
                     <a  href="afterstaffpayment.php" class="links"><button class="afterlnks rounded">Payment</button></a>
                   </li> 
                   <li class="nav-item m-lg-3 b-lg-2 h5 col" >
                     <a  href="afterstaffprospects.php" class="links"><button class="afterlnks rounded">Prospects</button></a>
                   </li>
                   
                   

                </ul>
              </div>
           </div>
             
         </nav>
         </div>
         <!--end of nav-->
          <br><br>
         <!--progress-->
         
         <div class="m-4">
            <P class="h4 m-2"style="color:darkmagenta;"> Progression:</p>
         <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
         <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%">75%</div>
         </div>

         </div>

          <br>
         
       

         <!-- end of progress-->
       
        <!-- featured products-->
        
        
<!--end of slide for featured items-->

          <!--core values-->

  <div class=" container">
         <div class="m-2  text-center " style="color:green; font-weight:bold;font-size:larger;">
         Our core values and Principals:
         </div>
         
         
         

         <p class="" style="color:darkmagenta;font-size:large;" >T-Team work</p>
          <p style="color:darkmagenta;">We work as team because together we built a strong team with great vision.</p>

          <p class="" style="color:darkmagenta;font-size:large;" >I- integrity</p>
        <p style="color:darkmagenta;">We live and work under the quality of being honest and having strong moral principles.</p>

        <p class="" style="color:darkmagenta; font-size:large;" >E- Excellence</p>
        <p style="color:darkmagenta;">We aim at having good quality work and being outstanding or extremely good in what we do.</p>

       

       
          
       </div>
       <br><br>
    <!--footer with useful links-->
    
    <div class="mb-0 pt-3 ps-5 container-fluid  justify-content-center" style="background-color: lightgreen;" >
       
         <p class="h6 otherlnks ">contact ADMIN at:</p> 
          
          <div>
          <a href="mailto:admin@clockwaveits.com"><i class="bi bi-envelope"></i> admin@clockwaveits.com</a>
          </div>
          <div>
          <a href="mailto:tugumedeborah22@gmail.com"><i class="bi bi-envelope"></i> tugumedeborah22@gmail.com</a>
          </div>
          <div>
          <a href="mailto:rukundodaniel22@gmail.com"><i class="bi bi-envelope"></i> rukundodaniel22@gmail.com</a>
          </div>
        
    </div>
         
          
 
       
        
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <footer>
    <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center " style="background-image: url(careerbgimg.JPG);"><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
   
  </footer>
  </html>