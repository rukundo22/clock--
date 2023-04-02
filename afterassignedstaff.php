<?php
$staffId='';
$errors= array( 'staffId'=>'',  'clientsViews'=>'');
if(isset($_POST['staffconfirm'])){

//check staff ID number.
if(empty($_POST['staffId'])){
  $errors['staffId'] = 'staff ID number is required ';
 }else{
  $staffId=$_POST['staffId'];
  $uppercase=preg_match('@[A-Z]@',$staffId);
  $number=preg_match('@[0-9]@', $staffId);
  if(!$uppercase || !$number || strlen($staffId)>8 ){
      $errors['staffId'] =  'invalid staff ID number';
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
     <div class="container">
   <!-- back to afterlogin home page-->
   <div class="text-center h2"><a href="afterlogin.php" class=" links"><i class="bi bi-arrow-left-circle-fill "></i> back </a></div>
   <br> 

     <!-- assigned staff member-->
     <div class="text-center container m-2">
     <div class="  staffpic2">
       <img src="ac.jpg" alt="image of sent staff" class="staffpic  border  rounded-circle">
      </div>
      <p class="h4" style="color:green;">Mr name</p>
     </div>
<!-- #staff id -->
<div class="text-center container m-2">
     <p class="h5" style="color:darkmagenta;">ID card:</p>
     <div class="  staffpic2">
       <img src="aboutbg2.jpg" alt="id of sent staff" class="staffpicid  border rounded">
      </div>
      
     </div>
<!-- check if staff is our member -->
<br><br><br>

<div class="container text-center m-2">
  
<p class="" style="color:red;">Everything looks suspicious?</p>

      <form name="checkstaff" action="afterassignedstaff.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" class="" enctype="multipart/form-data" class="container">
     
            <label>ASK! and enter staff ID:</label><br>
             <input class=" m-1" type="text" name="staffId" placeholder="" value="" aria-label="ask and enter staff id" maxlength="10" required>
             <div class="text-danger"><?php echo $errors['staffId']; ?></div>
            

            <input type="submit" class=" view m-1 rounded " placeholder=" " aria-label=" submit to view if staff is authentic" name="staffconfirm" value="submit" required>


     </form>
    </div>

</div>
   <br> <br> <br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <footer>
    <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center " style="background-image: url(careerbgimg.JPG);"><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
   
  </footer>
  </html>