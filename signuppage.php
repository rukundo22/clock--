<?php 
$firstName=$lastName=$telephone=$email=$address=$password1=$password2='';
$errors= array('firstName' => '', 'lastName'=>'', 'telephone'=>'', 'email'=>'','address'=>'','password'=>'','password1'=>'' );
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
    $errors['address'] = ' current address is required';
   }else{
    $address=$_POST['address'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $address)){
        $errors['address'] =  'current address must be letters and spaces only';
    }
   }

   
   //check password
   if(empty($_POST['password2'])){
      $errors['password'] = ' password is required';
     }else{
      $password1=$_POST['password1'];
      $password2=$_POST['password2'];
     }
     $uppercase=preg_match('@[A-Z]@',$password1);
     $lowercase=preg_match('@[a-z]@', $password1);
     $number=preg_match('@[0-9]@', $password1);
     $specialchars=preg_match('@[^\w]@', $password1);
     if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password1)<8 ){
       $errors['password1']='weak password, it should be 8 characters long with number,uppercase and special charactor(@,&)';
     }

     
     if($password1===$password2){
       
   }else{
    
        $errors['password'] =  'passwords not matching!!';
    }
   //checking if there are any errors
   if (array_filter($errors)){

   }else{
    header('location:accountauth.php');
   }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="clockwave.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body class="mt-4">
       <div class=" d-flex justify-content-center">
         <div><p class="h1 signup"> Sign Up</p>
        <p class=" easy">.   it's quick and easy.   .</p></div>
       </div>
      
        <form class="container justify-content-center signupform" name="signup" action="signuppage.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">
            <div class="row " id="flexform">
            <div class="col">
                  <label for="first name">First name:</label>
                  <input type="text" class="form-control m-2" placeholder="enter first name" name="firstName" aria-label=" first name"  value="<?php echo htmlspecialchars($firstName) ; ?>" required>
                  <div class="text-danger"><?php echo $errors['firstName']; ?></div>
            </div>
            <div class="col">
                  <label for="last name">Last name:</label>
                  <input type="text" class="form-control m-2" placeholder=" enter last name" name="lastName" aria-label="last name"  value="<?php echo htmlspecialchars($lastName) ; ?>" required>
                  <div class="text-danger"><?php echo $errors['lastName']; ?></div>
            </div>
            </div>
            <div class=" ">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control m-2" id=""  placeholder="type email here" name="email"  value="<?php echo htmlspecialchars($email) ; ?>" required> 
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
                      <input type=" tel" class="form-control m-2" placeholder=" telephone e.g 077****234 " aria-label="clients contact" name="telephone"  value="<?php echo htmlspecialchars($telephone) ; ?>" required>
                      <div class="text-danger"><?php echo $errors['telephone']; ?></div>
                </div>
                </div>
                <div class="row" id="flexform">
                <div class="col">
                  <label for="clients password">password:</label>
                     <input type="password"
                      placeholder="enter password" name="password1" aria-label="clients password " class="form-control m-2" required>
                      <div class="text-danger text-center "><?php echo $errors['password1']; ?></div>
                </div>
                <div class="col">
                    <label for="clients password">Repeat password:</label>
                     <input type="password" placeholder="repeat password" name="password2" aria-label="repeat your password" class="form-control m-2" required>
                     <div class="text-danger text-center "><?php echo $errors['password']; ?></div>
                </div>
                </div>
                <div class=" justify-content-around">
                    <p>By creating an account you agree to our <a href="" target="_self"> terms</a>. learn how we collect, use and share your data in our <a href="" target="_self">Data policy</a> and how we use cookies and similar technologies in our <a href="" target="">Cookies policy</a>. You may receive sms notifications from us and can opt out any time.</p>
                </div>
                <div class=" d-flex justify-content-center">
                   <input type="submit" class="signupbtn m-2 rounded-pill" name="submit">
                </div>
        </form>
        <br>
        <footer>
            <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center " style="background-image: url(careerbgimg.JPG);"><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
      </footer>
     
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>