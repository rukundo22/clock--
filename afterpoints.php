<?php
$invoiceId='';
$errors= array( 'invoiceId'=>'',  'clientsViews'=>'');
if(isset($_POST['orderView'])){

//check telephone
if(empty($_POST['invoiceId'])){
  $errors['invoiceId'] = ' invoice ID number is required';
 }else{
  $invoiceId=$_POST['invoiceId'];
  if(!preg_match('/^[0-9\s]+$/' , $invoiceId)){
      $errors['invoiceId'] =  'invalid invoice Id number';
  }
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
     
   <!-- back to afterlogin home page-->
   <div class="text-center h2 container"><a href="afterlogin.php" class=" links"><i class="bi bi-arrow-left-circle-fill "></i> back </a></div>

   <br><br><br>
  <!-- points-->
  <div class="container">
  <div class="easyview text-center m-3"> Your Points</div>

  <div class="row text-center m-2">
    <p class="col text-end m-1 points2 h5">Points:</p>
    <p class="col m-2 text-start points fw-bold">123</p>
  </div>
  
  <div class="row text-center">
    <div class="col m-2 text-end points2 h5">Use points:</div>
    <div class="container col text-start"> 

      <form name="orderReview" action="afterpoints.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" class="text-start col" enctype="multipart/form-data">
     
            <label>enter invoice ID:</label><br>
             <input class=" m-1" type="text" name="invoiceId" placeholder="" value="" maxlength="6" required>
             <div class="text-danger"><?php echo $errors['invoiceId'];  ?></div>
            

            <input type="submit" class=" view m-1 rounded " placeholder=" " aria-label=" spend your points" name="orderView" value="spend" required>


     </form>
    </div>
  </div>

  </div>
  <!--end of points section-->
  <br><br><br><br><br><br>

  


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <footer>
    <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center " style="background-image: url(careerbgimg.JPG);"><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
   
  </footer>
  </html>