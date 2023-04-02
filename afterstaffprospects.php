
<?php 
$firstName=$lastName=$telephone=$email=$address=$staffId='';
$errors= array('firstName' => '', 'lastName'=>'', 'telephone'=>'', 'email'=>'','address'=>'' ,'staffId'=>'', );
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

   //check address
   if(empty($_POST['address'])){
    $errors['address'] = ' clients address is required';
   }else{
    $address=$_POST['address'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $address)){
        $errors['address'] =  'address must be letters and spaces only';
    }
   }
     
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
     
   <!-- back to afterstafflogin home page-->
   <div class="text-center h2"><a href="afterstafflogin.php" class=" links"><i class="bi bi-arrow-left-circle-fill "></i> back </a></div>
   <br><br>
   <!-- orders-->
    <div class="easyview text-center m-3">Future Potential clients</div>
  
   <!-- form for reports.-->
   <div class=" container text-center">


   <form class="container justify-content-center signupform" name="prospects" action="afterstaffprospects.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">

<div class="row " id="flexform">
<div class="col">
      <label for="first name">First name:</label>
      <input type="text" class="form-control m-2" placeholder="" name="firstName" aria-label=" first name"  value="<?php echo htmlspecialchars($firstName) ; ?>" required>
      <div class="text-danger"><?php echo $errors['firstName']; ?></div>
</div>
<div class="col">
      <label for="last name">Last name:</label>
      <input type="text" class="form-control m-2" placeholder="" name="lastName" aria-label="last name"  value="<?php echo htmlspecialchars($lastName) ; ?>" required>
      <div class="text-danger"><?php echo $errors['lastName']; ?></div>
</div>
</div>

<div class=" ">
      <label for="email">Email:</label>
      <input type="email" class="form-control m-2" id=""  placeholder="" name="email"  value="<?php echo htmlspecialchars($email) ; ?>" > 
      <div class="text-danger"><?php echo $errors['email']; ?></div>
</div>

<div class="row " id="flexform">
    <div class="col">
          <label for="clients address">Address:</label>
          <input type="text" class="form-control m-2" placeholder="" aria-label=" clients Address" name="address"  value="<?php echo htmlspecialchars($address) ; ?>" required>
          <div class="text-danger"><?php echo $errors['address']; ?></div>
    </div>
    <div class="col">
        <label for=" clients contact">Telephone:</label>
          <input type=" tel" class="form-control m-2" placeholder=" " aria-label="clients contact" name="telephone"  value="<?php echo htmlspecialchars($telephone) ; ?>" required>
          <div class="text-danger"><?php echo $errors['telephone']; ?></div>
    </div>
    </div>
    
      <label for="ticket-ID">Your-ID:</label>
            <input type="text" class="form-control m-1" placeholder=" " aria-label=" This is staff ID" name="staffId" value="<?php echo htmlspecialchars($staffId) ; ?>" maxlength="9" required>
            <div class="text-danger"><?php echo $errors['staffId']; ?></div>
    
    <div class=" d-flex justify-content-center">
       <input type="submit" class="signupbtn m-2 rounded-pill" name="submit">
    </div>
</form>

            
</div>

<br><br><br><br><br><br><br><br>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <footer>
    <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center " style="background-image: url(careerbgimg.JPG);"><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
   
  </footer>
  </html>