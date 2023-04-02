<?php 
$firstName=$lastName=$telephone=$email=$city=$village=$address=$message=$salary=$refNumber=$filesup1=$filesup2=$files='';
$errors= array('firstName' => '', 'lastName'=>'', 'telephone'=>'', 'email'=>'','city'=>'' ,'village'=>'', 'salary'=>'','address'=>'', 'refNumber'=>'' ,'filesup1'=>'', 'filesup2'=>'');
if(isset($_POST['submit']))
{
   
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

   
    //check address
   if(empty($_POST['address'])){
    $errors['address'] = ' current address is required';
   }else{
    $address=$_POST['address'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $address)){
        $errors['address'] =  'current address must be letters and spaces only';
    }
   }
   //check job ref number.
   if(empty($_POST['refNumber'])){
    $errors['refNumber'] = 'job reference number is required ';
   }else{
    $refNumber=$_POST['refNumber'];
    $uppercase=preg_match('@[A-Z]@',$refNumber);
    $number=preg_match('@[0-9]@', $refNumber);
    if(!$uppercase || !$number || strlen($refNumber)>8 ){
        $errors['refNumber'] =  'invalid job reference number';
    }
   }
   
   //check salary
   if(empty($_POST['salary'])){
    $errors['salary'] = ' expected salary is required';
   }else{
    $salary=$_POST['salary'];
    if(!preg_match('/^[0-9\s]+$/' , $salary)){
        $errors['salary'] =  'salary must be a number';
    }
   }
     
   //checking for upload files. first file
   $files=$_FILES['filesup1'];
     //print_r($files);
    // echo 'start'.'<br/>';
     $fileName=$files['name'];
     $fileSize=$files['size'];
     $fileLocation=$files['tmp_name'];
     $fileErrors=$files['error'];
     $fileFullpath=$files['full_path'];
     $fileType=$files['type'];
     /*echo $fileName .'<br/>';
     echo $fileSize .'<br/>';
      echo $fileErrors .'<br/>';
     echo $fileLocation .'<br/>';
     echo $fileFullpath .'<br/>';
     echo $fileType .'<br/>';
     */
   
     $splitfile= explode('.',$fileName);
     //echo $splitfile[1] .'<br/>';
      
     $fileExtention=strtolower($splitfile[1]);
     //echo $fileExtention .'<br/>';
     
     $allowedExtentions=array('pdf','doc','docx');
     /*echo $allowedExtentions[0] .'<br/>';
     echo $allowedExtentions[1] .'<br/>';
     echo $allowedExtentions[2] .'<br/>';
     */
     if(in_array($fileExtention,$allowedExtentions) )
     { 
      if($fileSize<4000000){
        $errors['filesup1']= '' ;}else{
          $errors['filesup1']= ' file must be less than 4mbs !' ;
        }
      
     }else{
      $errors['filesup1']='file not supported' ;
     }
      
     //checking for upload files. second file
   $files=$_FILES['filesup2'];
  
   $fileName=$files['name'];
   $fileSize=$files['size'];
   $fileLocation=$files['tmp_name'];
   $fileErrors=$files['error'];
   $fileFullpath=$files['full_path'];
   $fileType=$files['type'];
   
   $splitfile= explode('.',$fileName);
   
    
   $fileExtention=strtolower($splitfile[1]);
   
   $allowedExtentions=array('pdf','doc','docx');
   
   if(in_array($fileExtention,$allowedExtentions) )
   { 
    if($fileSize<4000000){
      $errors['filesup2']= '' ;}else{
        $errors['filesup2']= ' file must be less than 4mbs !' ;
      }
    
   }else{
    $errors['filesup2']='file not supported' ;
   }
    
    //checking for all errors.
   if (array_filter($errors)){

   }else{
    $message='Application sent successfuly <i class="bi bi-check-circle"></i>';
   }
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>jobs/careers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="clockwave.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body style="background-image: url(careerbgimg.JPG);">
  <main class=" m-4 ">
    <div class=" m-5 "> 
      <div class="justify-content-around d-md-inline-block">
        <img src="careerimg.jpg" alt=" marketting image" class=" imgser m-2"> 
        <p style="color: white;" class=" careertip" >
        Clockwave innovation and technical solutions ltd is an aspiring lead provider of technical and innovative solutions to optimise productivity in all sectors of the economy. And we seek talented and creative individuals to join our team. <a href="">Click here</a> to check out the vacancies available and fill the form below.</p>
         <p class=" careertip " style="color: white; font-family: cursive;"> NOTE: Clockwave i.t.s is a fair and equal opportunity employer.Any payments made to aid one's recruiment is an offense and will lead to disqualification.   </p> 
        
      </div>
    </div>
    <br>

  
    <div class="formt text-center"><p class="  h3" style="color: white;">Application Form</p>
  <form class="form-control ms-0 me-4 container txtcareer" action="careers.php" method="POST" target="_self" enctype="multipart/form-data" accept-charset="utf-8">
    <br>
    <div class="text-success text-center h3 fw-bold">
      <?php echo $message ; ?>
    </div>
    <div class="row " id="flexform">
    <div class="col">
    <label for="first name ">First Name:</label>
    <input class="form-control" type="text" name="firstName" spaceholder="" value="<?php echo htmlspecialchars($firstName) ; ?>" required> 
    <div class="text-danger"><?php echo $errors['firstName']; ?></div>
    </div>
    <div class="col">
    <label for="last name">Last Name:</label>
    <input class="form-control" type="text" name="lastName" spaceholder="" value="<?php echo htmlspecialchars($lastName) ; ?>" required>
    <div class="text-danger"><?php echo $errors['lastName']; ?></div>
    </div>
    </div>
    <div>
    <label for="email">Email:</label>
    <input class="form-control" type="email" name="email" placeholder="" value="<?php echo htmlspecialchars($email) ; ?>" required>
    <div class="text-danger"><?php echo $errors['email']; ?></div>
    </div>
    <div class="row" id="flexform">
    <div class="col">
    <label for="phone">Phone:</label>
    <input class="form-control" type="tel" name="telephone" placeholder="0756*****4" value="<?php echo htmlspecialchars($telephone) ; ?>" required>
    <div class="text-danger"><?php echo $errors['telephone']; ?></div>
    </div>
    <div class="col">
    <label for="Address">Current Address:</label>
    <input class="form-control" type="text" name="address" placeholder="" value="<?php echo htmlspecialchars($address) ; ?>" required>
    <div class="text-danger"><?php echo $errors['address']; ?></div>
  </div>
  </div>
   <br>
  <section>
    
        <legend class="fw-bold">Prefered area of placement</legend>
        <div class="row" id="flexform">
        <div class="col">
        <label for="city of work">City/District:</label>
        <input class="form-control" type="text" name="city" placeholder="" value="<?php echo htmlspecialchars($city) ; ?>" required>
        <div class="text-danger"><?php echo $errors['city']; ?></div>
        </div>
        <div class="col">
        <label for="village"> Village/Division:</label>
        <input class="form-control"  type="text" name="village" placeholder="" value="<?php echo htmlspecialchars($village) ; ?>" required>
        <div class="text-danger"><?php echo $errors['village']; ?></div>
        </div>
        </div>
  </section>
    <br>
  <section>
    <div class="row" id="flexform">
    <div class="col">
    <fieldset>
      <legend class="fw-bold">upload files (pdf/doc/img only)</legend>
      Academic Documents :<br>
      <input class="form-control" id="academicdoc" type="file" name="filesup1" required>
      <div class="text-danger"><?php echo $errors['filesup1']; ?></div>
    </fieldset>
   </div>
     <div class="col">
    <fieldset>
      <legend><br></legend>
      National id :<br>
      <input class="form-control" id="nationalid" type="file" name="filesup2" required>
      <div class="text-danger"><?php echo $errors['filesup2']; ?></div>
        
     </fieldset>
     </div>
     </div>
     
  </section>
     <br>
       <div class="row" id="flexform">
       <div class="col">
        <label for="reference number"> Job reference No. :</label>
      <input  class="form-control" type="text" name="refNumber" placeholder="" value="<?php echo htmlspecialchars($refNumber) ; ?>"  required>
      <div class="text-danger"><?php echo $errors['refNumber']; ?></div>
       </div>
       <div class="col">
        <label for="salary"> salary Expectation:</label>
        <input  class="form-control" type="text" name="salary" placeholder="" value="<?php echo htmlspecialchars($salary) ; ?>" maxlength="9" required>
        <div class="text-danger"><?php echo $errors['salary']; ?></div>
      </div>
      </div>
      
      <br>
     <input class="form-control applyt" type="submit" name="submit"> 
      <br>
      <br>
</form>
</div>
</main>
<br>
<br>
<footer class="">
  <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center careerfooter" ><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>