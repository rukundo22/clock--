
<?php 
$productId=$price=$itemCode=$featured=$status=$clientPoints=$staffAssigned=$commission=$bonus=$allowances=$staffScore=$staffId=$clientId='';
$errors= array('productId' => '', 'price'=>'', 'itemCode'=>'','featured'=>'','status'=>'' ,'clientPoints'=>'','staffAssigned'=>'','commission'=>'','bonus'=>'','allowances'=>'','staffScore'=>'','staffId'=>'','clientId'=>'' );



if(isset($_POST['updateProduct'])) { 

    //check product id.
if(empty($_POST['productId'])){
    $errors['productId'] = ' product ID number is required ';
   }else{
    $productId=$_POST['productId'];
    if(!preg_match('/^[0-9\s]+$/'  , $productId)){
     
    $errors['productId'] =  'clients name must be digits only';
    }
   }
  

   //check item code.
if(empty($_POST['itemCode'])){
    $errors['itemCode'] = 'item code is required ';
   }else{
    $itemCode=$_POST['itemCode'];
    $uppercase=preg_match('@[A-Z]@',$itemCode);
    $number=preg_match('@[0-9]@', $itemCode);
    if(!$uppercase || !$number || strlen($itemCode)>15 ){
        $errors['itemCode'] =  'invalid item code';
    }
   }

   //check price
   if(empty($_POST['price'])){
    $errors['price'] = ' product price is required';
   }else{
    $price=$_POST['price'];
    if(!preg_match('/^[0-9\s]+$/' , $price)){
        $errors['price'] =  'invalid product price';
    }
   }


   //check featured
   if(empty($_POST['featured'])){
    $errors['featured'] = '  featured is required';
   }else{
    $featured=$_POST['featured'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $featured)){
        $errors['featured'] =  'featured must be letters and spaces only';
    }
   }

   //check status
   if(empty($_POST['status'])){
    $errors['status'] = '  status  is required';
   }else{
    $status=$_POST['status'];
    
    if(!preg_match('/^[a-zA-Z\s]+$/' , $status)){
        $errors['status'] =  'status must be letters and spaces only';
    }
   }

   //checking for all errors.
   if (array_filter($errors)){

   }else{
    header('location:requestsub.php');
   }
  }

  //check for second form of client update

  if(isset($_POST['updateClient'])){

   //checking for client ID

   if(empty($_POST['clientId'])){
    $errors['clientId'] = ' client id is required';
   }else{
    $clientId=$_POST['clientId'];
    if(!preg_match('/^[0-9\s]+$/' , $clientId)){
        $errors['clientId'] =  'invalid client id format';
    }
   }

    
   //check client points
   if(empty($_POST['clientPoints'])){
    $errors['clientPoints'] = ' client points is required';
   }else{
    $clientPoints=$_POST['clientPoints'];
    if(!preg_match('/^[0-9\s]+$/' , $clientPoints)){
        $errors['clientPoints'] =  'invalid client points format';
    }
   }

   //checking assigned staff
if(empty($_POST['staffAssigned'])){
    $errors['staffAssigned'] = 'staff id is required ';
   }else{
    $staffAssigned=$_POST['staffAssigned'];
    $uppercase=preg_match('@[A-Z]@',$staffAssigned);
    $number=preg_match('@[0-9]@', $staffAssigned);
    if(!$uppercase || !$number || strlen($staffAssigned)>9 ){
        $errors['staffAssigned'] =  'invalid staff id';
    }
   }


  }
//checking form 3 staff update
  if(isset($_POST['updateStaff'])){
   
    // checking for staff id

    if(empty($_POST['staffId'])){
        $errors['staffId'] = 'staff id is required ';
       }else{
        $staffId=$_POST['staffId'];
        $uppercase=preg_match('@[A-Z]@',$staffId);
        $number=preg_match('@[0-9]@', $staffId);
        if(!$uppercase || !$number || strlen($staffId)>9 ){
            $errors['staffId'] =  'invalid staff id';
        }
       }
    
       
   //check commission
   if(empty($_POST['commission'])){
    $errors['commission'] = ' commission is required';
   }else{
    $commission=$_POST['commission'];
    if(!preg_match('/^[0-9\s]+$/' , $commission)){
        $errors['commission'] =  'invalid commission format';
    }
   }

   
   //check bonus
   if(empty($_POST['bonus'])){
    $errors['bonus'] = ' bonus is required';
   }else{
    $bonus=$_POST['bonus'];
    if(!preg_match('/^[0-9\s]+$/' , $bonus)){
        $errors['bonus'] =  'invalid bonus format';
    }
   }

   
   //check allowances
   if(empty($_POST['allowances'])){
    $errors['allowances'] = ' allowances is required';
   }else{
    $allowances=$_POST['allowances'];
    if(!preg_match('/^[0-9\s]+$/' , $allowances)){
        $errors['allowances'] =  'invalid allowances format';
    }
   }

   
   //check staff score
   if(empty($_POST['staffScore'])){
    $errors['staffScore'] = ' staff Score is required';
   }else{
    $staffScore=$_POST['staffScore'];
    if(!preg_match('/^[0-9\s]+$/' , $staffScore)){
        $errors['staffScore'] =  'invalid staff Score format';
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
     
   <!-- back to afterstafflogin home page-->
   <div class="text-center h2"><a href="admin.php" class=" links"><i class="bi bi-arrow-left-circle-fill "></i> back </a></div>
   <br><br>
   
    <div class="easyview text-center m-3">Updates</div>
  
   

   <div class=" text-center m-3 h6" style="color:green;"> product Update</div>
  
   <div class=" container text-center">


   <form class="container justify-content-center signupform" name="productUpdate" action="afteradminupdates.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">


      <label for="product id">product ID:</label>
      <input type="text" class="form-control m-2" placeholder="" name="productId" aria-label=" product id"  value="<?php echo htmlspecialchars($productId) ; ?>" required maxlength="9">
      <div class="text-danger"><?php echo $errors['productId']; ?></div>


      <label for="item code">item code:</label>
      <input type="text" class="form-control m-2" placeholder="" name="itemCode" aria-label="item code"  value="<?php echo htmlspecialchars($itemCode) ; ?>" required maxlength="30">
      <div class="text-danger"><?php echo $errors['itemCode']; ?></div>


      <label for="product to price">Price:</label>
      <input type="text" required name="price" class="form-control m-2" value="<?php echo htmlspecialchars($price) ; ?>" maxlength="9">
      <div class="text-danger"><?php echo $errors['price']; ?></div>


      <label for="featured product">featured:</label>
      <input type="text" class="form-control m-2" placeholder="" aria-label=" featured product" name="featured"  value="<?php echo htmlspecialchars($featured) ; ?>" required>
          <div class="text-danger"><?php echo $errors['featured']; ?></div>
    
        <label for="product status">status:</label>
          <input type=" text" class="form-control m-2" placeholder=" " aria-label=" product status" name="status"  value="<?php echo htmlspecialchars($status) ; ?>" required>
          <div class="text-danger"><?php echo $errors['status']; ?></div>
    
    
      
    <div class=" d-flex justify-content-center">
       <input type="submit" class="signupbtn m-2 rounded-pill" name="updateProduct" value="update"><br>
    </div>
</form>
</div>


<div class=" text-center m-3 h6" style="color:green;"> clients Update</div>
  
   <div class=" container text-center">


   <form class="container justify-content-center signupform" name="clientUpdate" action="afteradminupdates.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">


   <label for="clients id">clients ID:</label>
      <input type="text" class="form-control m-2" placeholder="" name="clientId" aria-label=" clients id"  value="<?php echo htmlspecialchars($clientId) ; ?>" required maxlength="9">
      <div class="text-danger"><?php echo $errors['clientId']; ?></div>

   
    <label for="clients points">clients points:</label>
      <input type="text" class="form-control m-2" placeholder="" name="clientPoints" aria-label=" clients points"  value="<?php echo htmlspecialchars($clientPoints) ; ?>" required maxlength="9">
      <div class="text-danger"><?php echo $errors['clientPoints']; ?></div>


      <label for="id of staff assigned">ID of staff assigned:</label>
      <input type="text" class="form-control m-2" placeholder="" name="staffAssigned" aria-label="id of staff assigned"  value="<?php echo htmlspecialchars($staffAssigned) ; ?>" required maxlength="30">
      <div class="text-danger"><?php echo $errors['staffAssigned']; ?></div>


       
    <div class=" d-flex justify-content-center">
       <input type="submit" class="signupbtn m-2 rounded-pill" name="updateClient" value="update"><br>
    </div>
</form>
</div>



<div class=" text-center m-3 h6" style="color:green;"> staff Update</div>
  
  <div class=" container text-center">


  <form class="container justify-content-center signupform" name="staffUpdate" action="afteradminupdates.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">


     <label for="staff id">staff ID:</label>
     <input type="text" class="form-control m-2" placeholder="" name="staffId" aria-label=" staff id"  value="<?php echo htmlspecialchars($staffId) ; ?>" required maxlength="9">
     <div class="text-danger"><?php echo $errors['staffId']; ?></div>


     <label for=" staff commission">commission:</label>
     <input type="text" class="form-control m-2" placeholder="" name="commission" aria-label="staff commission"  value="<?php echo htmlspecialchars($commission) ; ?>" required maxlength="30">
     <div class="text-danger"><?php echo $errors['commission']; ?></div>


     <label for="staff bonus">bonus:</label>
     <input type="text" class="form-control m-2" placeholder="" aria-label=" staff bonus" name="bonus"  value="<?php echo htmlspecialchars($bonus) ; ?>" required>
         <div class="text-danger"><?php echo $errors['bonus']; ?></div>


     <label for="staff allowances">Allowances:</label>
     <input type="text" class="form-control m-2" placeholder="" aria-label=" staff allowances" name="allowances"  value="<?php echo htmlspecialchars($allowances) ; ?>" required>
         <div class="text-danger"><?php echo $errors['allowances']; ?></div>
   
       <label for="staff score">staff score:</label>
         <input type=" text" class="form-control m-2" placeholder=" " aria-label=" staff score" name="staffScore"  value="<?php echo htmlspecialchars($staffScore) ; ?>" required>
         <div class="text-danger"><?php echo $errors['staffScore']; ?></div>
   
   
     
   <div class=" d-flex justify-content-center">
      <input type="submit" class="signupbtn m-2 rounded-pill" name="updateStaff" value="update"><br>
   </div>
</form>
</div>

<br><br><br><br><br>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <footer>
    <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center " style="background-image: url(careerbgimg.JPG);"><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
   
  </footer>
  </html>