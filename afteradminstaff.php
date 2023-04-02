
<?php 
$firstName=$lastName=$telephone=$email=$address=$staffId=$commission=$staffQualifications=$passportPhoto=$idPicture=$staffScore=$staffPassword=$bonus=$allowances='';
$errors= array('firstName' => '', 'lastName'=>'', 'telephone'=>'', 'email'=>'','address'=>'' ,'staffId'=>'','commission'=>'','staffQualifications'=>'','passportPhoto'=>'','idPicture'=>'','staffScore'=>'','staffPassword'=>'','bonus'=>'','allowances'=>'' );
if(isset($_POST['upload'])) { 

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

     //check staff qualifications
   if(empty($_POST['staffQualifications'])){
    $errors['staffQualifications'] = '  staff qualification  is required';
   }else{
    $staffQualifications=$_POST['staffQualifications'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $staffQualifications)){
        $errors['staffQualifications'] =  'staff Qualifications must be letters and spaces only';
    }
   }

   //check staff password.
if(empty($_POST['staffPassword'])){
    $errors['staffPassword'] = 'staff Password is required ';
   }else{
    $staffPassword=$_POST['staffPassword'];
    $uppercase=preg_match('@[A-Z]@',$staffPassword);
    $number=preg_match('@[0-9]@', $staffPassword);
    if(!$uppercase || !$number || strlen($staffPassword)>8 ){
        $errors['staffPassword'] =  'invalid staff password number';
    }
   }

   //check staff score
   if(empty($_POST['staffScore'])){
    $errors['staffScore'] = '  staff score is required';
   }else{
    $staffScore=$_POST['staffScore'];
    if(!preg_match('/^[0-9\s]+$/' , $staffScore)){
        $errors['staffScore'] =  'invalid staff score';
    }
   }

   //check staff commission
   if(empty($_POST['commission'])){
    $errors['commission'] = '  staff commission is required';
   }else{
    $commission=$_POST['commission'];
    if(!preg_match('/^[0-9\s]+$/' , $commission)){
        $errors['commission'] =  'invalid staff  commission';
    }
   }

   //check staff bonus
   if(empty($_POST['bonus'])){
    $errors['bonus'] = '  staff bonus is required';
   }else{
    $bonus=$_POST['bonus'];
    if(!preg_match('/^[0-9\s]+$/' , $bonus)){
        $errors['bonus'] =  'invalid staff  bonus';
    }
   }


   //check staff allowances
   if(empty($_POST['allowances'])){
    $errors['allowances'] = '  staff allowances is required';
   }else{
    $allowances=$_POST['allowances'];
    if(!preg_match('/^[0-9\s]+$/' , $allowances)){
        $errors['allowances'] =  'invalid staff  allowances';
    }
   }


   //checking for upload files. passport photo
   $files=$_FILES['passportPhoto'];
  
   $fileName=$files['name'];
   $fileSize=$files['size'];
   $fileLocation=$files['tmp_name'];
   $fileErrors=$files['error'];
   $fileFullpath=$files['full_path'];
   $fileType=$files['type'];
   
   $splitfile= explode('.',$fileName);
   
    
   $fileExtention=strtolower($splitfile[1]);
   
   $allowedExtentions=array('jpeg','png','jpg');
   
   if(in_array($fileExtention,$allowedExtentions) )
   { 
    if($fileSize<1000000){
      $errors['passportPhoto']= '' ;}else{
        $errors['passportPhoto']= ' file must be less than 1mbs !' ;
      }
    
   }else{
    $errors['passportPhoto']='file not supported' ;
   }


   //checking for upload files.  staff idPicture
   $files=$_FILES['idPicture'];
  
   $fileName=$files['name'];
   $fileSize=$files['size'];
   $fileLocation=$files['tmp_name'];
   $fileErrors=$files['error'];
   $fileFullpath=$files['full_path'];
   $fileType=$files['type'];
   
   $splitfile= explode('.',$fileName);
   
    
   $fileExtention=strtolower($splitfile[1]);
   
   $allowedExtentions=array('jpeg','png','jpg');
   
   if(in_array($fileExtention,$allowedExtentions) )
   { 
    if($fileSize<1000000){
      $errors['idPicture']= '' ;}else{
        $errors['idPicture']= ' file must be less than 1mbs !' ;
      }
    
   }else{
    $errors['idPicture']='file not supported' ;
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
   <div class="text-center h2"><a href="admin.php" class=" links"><i class="bi bi-arrow-left-circle-fill "></i> back </a></div>
   <br><br>
   <!-- orders-->
    <div class="easyview text-center m-3">Staff Details upload</div>
  
   <!-- form for reports.-->
   <div class=" container text-center">


   <form class="container justify-content-center signupform" name="staffdetails" action="afteradminstaff.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">


      <label for="first name">First name:</label>
      <input type="text" class="form-control m-2" placeholder="" name="firstName" aria-label=" first name"  value="<?php echo htmlspecialchars($firstName) ; ?>" required>
      <div class="text-danger"><?php echo $errors['firstName']; ?></div>


      <label for="last name">Last name:</label>
      <input type="text" class="form-control m-2" placeholder="" name="lastName" aria-label="last name"  value="<?php echo htmlspecialchars($lastName) ; ?>" required>
      <div class="text-danger"><?php echo $errors['lastName']; ?></div>




      <label for="email">Email:</label>
      <input type="email" class="form-control m-2" id=""  placeholder="" name="email"  value="<?php echo htmlspecialchars($email) ; ?>" > 
      <div class="text-danger"><?php echo $errors['email']; ?></div>



    
          <label for="staff address">Address:</label>
          <input type="text" class="form-control m-2" placeholder="" aria-label=" staff Address" name="address"  value="<?php echo htmlspecialchars($address) ; ?>" required>
          <div class="text-danger"><?php echo $errors['address']; ?></div>
    
        <label for=" clients contact">Telephone:</label>
          <input type=" tel" class="form-control m-2" placeholder=" " aria-label="clients contact" name="telephone"  value="<?php echo htmlspecialchars($telephone) ; ?>" required>
          <div class="text-danger"><?php echo $errors['telephone']; ?></div>
    
    
      <label for="staff-ID">staff-ID:</label>
            <input type="text" class="form-control m-1" placeholder=" " aria-label=" This is staff ID" name="staffId" value="<?php echo htmlspecialchars($staffId) ; ?>" maxlength="9" required>
            <div class="text-danger"><?php echo $errors['staffId']; ?></div>


            <label for="staff qualifications">Staff qualification:</label>
          <input type="text" class="form-control m-2" placeholder="" aria-label=" staff qualifications" name="staffQualifications"  value="<?php echo htmlspecialchars($staffQualifications) ; ?>" required>
          <div class="text-danger"><?php echo $errors['staffQualifications']; ?></div>


          <label for="staff password">Staff password:</label>
          <input type="text" class="form-control m-2" placeholder="" aria-label=" staff password" name="staffPassword"  value="<?php echo htmlspecialchars($staffPassword) ; ?>" required>
          <div class="text-danger"><?php echo $errors['staffPassword']; ?></div>

          <label for="staff score">Staff score:</label>
          <input type="text" class="form-control m-2" placeholder="" aria-label=" staff score" name="staffScore"  value="<?php echo htmlspecialchars($staffScore) ; ?>" required maxlength="9">
          <div class="text-danger"><?php echo $errors['staffScore']; ?></div>

          <label for="staff commission"> commission:</label>
          <input type="text" class="form-control m-2" placeholder="" aria-label=" staff commission" name="commission"  value="<?php echo htmlspecialchars($commission) ; ?>" required maxlength="9">
          <div class="text-danger"><?php echo $errors['commission']; ?></div>


          <label for="staff bonus"> Bonus:</label>
          <input type="text" class="form-control m-2" placeholder="" aria-label=" staff bonus" name="bonus"  value="<?php echo htmlspecialchars($bonus) ; ?>" required maxlength="9">
          <div class="text-danger"><?php echo $errors['bonus']; ?></div>

          <label for="staff allowances"> Allowances:</label>
          <input type="text" class="form-control m-2" placeholder="" aria-label=" staff allowances" name="allowances"  value="<?php echo htmlspecialchars($allowances) ; ?>" required maxlength="9">
          <div class="text-danger"><?php echo $errors['allowances']; ?></div>

          <label for="staff passport phote">Passport photo:</label>
          <input class="form-control" id="nationalid" type="file" name="passportPhoto" required>
         <div class="text-danger"><?php echo $errors['passportPhoto']; ?></div>

         

         <label for="staff's national id">Staff's national ID:</label>
          <input class="form-control" id="nationalid" type="file" name="idPicture" required>
         <div class="text-danger"><?php echo $errors['idPicture']; ?></div>



    
    <div class=" d-flex justify-content-center">
       <input type="submit" class="signupbtn m-2 rounded-pill" name="upload" value="upload">
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