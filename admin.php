<?php 
$productId=$productName=$productDescription=$price=$vat=$totalPrice=$profit=$commission=$status=$featured=$category=$itemCode='';
$errors= array('productId' => '', 'productName'=>'', 'productDescription'=>'', 'price'=>'','vat'=>'' ,'totalPrice'=>'', 'profit'=>'', 'commission'=>'', 'status'=>'', 'featured'=>'', 'category'=>'', 'itemCode'=>'','productImage1'=>'', 'productImage2'=>'', 'productImage3'=>'');
if(isset($_POST['upload'])){
   
    //check for product id
    if(empty($_POST['productId'])){
      $errors['staffId'] = 'staff ID number is required ';
     }else{
      $productId=$_POST['productId'];
      
      $number=preg_match('@[0-9]@', $productId);
      if( !$number || strlen($productId)>8 ){
          $errors['productId'] =  'invalid product ID number';
      }
     }

   //check product name
   if(empty($_POST['productName'])){
    $errors['productName'] = 'product name is required ';
   }else{
      $productName=$_POST['productName'];
       if(strlen($productName)>50){
        $errors['productName'] = 'product name is too long. ';
       }
   }
   
   //check for product discription
   if(empty($_POST['productDescription'])){
    $errors['productDescription'] = 'product description name is required ';
   }else{
      $productDescription=$_POST['productDescription'];
       if(strlen($productDescription)>500){
        $errors['productDescription'] = 'product description is too long. ';
       }
   }
   
    //check price
   if(empty($_POST['price'])){
    $errors['price'] = 'product price is required';
   }else{
    $price=$_POST['price'];
    if(!preg_match('/^[0-9\s]+$/' , $price)){
        $errors['price'] =  'price must be in digits';
    }
   }

   //check vat
   if(empty($_POST['vat'])){
    $errors['vat'] = 'vat is required';
   }else{
    $vat=$_POST['vat'];
    if(!preg_match('/^[0-9\s]+$/' , $vat)){
        $errors['vat'] =  'price must be in digits';
    }
   }

   //check totalprice
   if(empty($_POST['totalPrice'])){
    $errors['totalPrice'] = ' total price is required';
   }else{
    $totalPrice=$_POST['totalPrice'];
    if(!preg_match('/^[0-9\s]+$/' , $totalPrice)){
        $errors['totalPrice'] =  'total price must be in digits';
    }
   }

    //check profit
   if(empty($_POST['profit'])){
    $errors['profit'] = 'profit is required';
   }else{
    $profit=$_POST['profit'];
    if(!preg_match('/^[0-9\s]+$/' , $profit)){
        $errors['profit'] =  ' profit must be in digits';
    }
   }
    
    //check commission
   if(empty($_POST['commission'])){
    $errors['commission'] = 'commission is required';
   }else{
    $commission=$_POST['commission'];
    if(!preg_match('/^[0-9\s]+$/' , $commission)){
        $errors['commission'] =  ' commission must be in digits';
    }
   }

   //check status
   if(empty($_POST['status'])){
    $errors['status'] = '  product status is required';
   }else{
    $status=$_POST['status'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $status)){
        $errors['status'] = 'status must be letters and spaces only';
    }
   }

   //check featured
   if(empty($_POST['featured'])){
    $errors['featured'] = ' featured state is required';
   }else{
    $featured=$_POST['featured'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $featured)){
        $errors['featured'] =  'featured must be letters and spaces only';
    }
   }

   //check category
   if(empty($_POST['category'])){
    $errors['category'] = ' the category of product is required';
   }else{
    $category=$_POST['category'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $category)){
        $errors['category'] =  'category must be letters and spaces only';
    }
   }
   
   //check for itemCode
   if(empty($_POST['itemCode'])){
    $errors['itemCode'] = ' item code is required ';
   }else{
    $itemCode=$_POST['itemCode'];
    
  
    if(  strlen($itemCode)>20 ){
        $errors['itemCode'] =  'invalid item code number';
    }
   }

   //checking for upload files. productImage1
   $files=$_FILES['productImage1'];
  
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
      $errors['productImage1']= '' ;}else{
        $errors['productImage1']= ' file must be less than 1mbs !' ;
      }
    
   }else{
    $errors['productImage1']='file not supported' ;
   }
    

   //checking for upload files. productImage2
   $files=$_FILES['productImage2'];
  
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
      $errors['productImage2']= '' ;}else{
        $errors['productImage2']= ' file must be less than 1mbs !' ;
      }
    
   }else{
    $errors['productImage2']='file not supported' ;
   }

   //checking for upload files. productImage3
   $files=$_FILES['productImage3'];
  
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
      $errors['productImage3']= '' ;}else{
        $errors['productImage3']= ' file must be less than 1mbs !' ;
      }
    
   }else{
    $errors['productImage3']='file not supported' ;
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
                    <a href="afteradminstaff.php" class="links "><button class="afterlnks rounded">Upload staff</button></a>
                   </li>
                   <li class="nav-item m-lg-3 b-lg-2  h5 col" >
                    <a  href="afteradmintickets.php" class="links"><button class="afterlnks rounded">load ticket</button></a>
                   </li>
                   <li class="nav-item m-lg-3 b-lg-2 h5 col" >
                     <a  href="afteradminupdates.php" class="links"><button class="afterlnks rounded">Updates</button></a>
                   </li> 
                   <li class="nav-item m-lg-3 b-lg-2 h5 col" >
                     <a  href="afteradmininvoices.php" class="links"><button class="afterlnks rounded">Invoices</button></a>
                   </li>
                   
                   

                </ul>
              </div>
           </div>
             
         </nav>
         </div>
         <!--end of nav-->
          <br>
          <div class="h3 text-center" style="color: green;"> Upload a Product</div>
         <!--loading products-->
         <div class=" inquiryform text-center container">
         
        <form name="productLoad" action="admin.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" class="m-2 form1 rounded" enctype="multipart/form-data">

        <label for="product id">product ID:</label>
            <input type="text" class="form-control m-2" placeholder="" aria-label="PRODUCT ID" name="productId" value="<?php echo htmlspecialchars($productId) ; ?>" required>
            <div class="text-danger"><?php echo $errors['productId']; ?></div>
          

          <label for="product name">Product Name:</label>
            <input type="text" class="form-control m-2" placeholder="" aria-label=" product name" name="productName" value="<?php echo htmlspecialchars($productName) ; ?>" required>
            <div class="text-danger"><?php echo $errors['productName']; ?></div>
          

          <label>Product description: </label>
          <textarea required name="productDescription" class="form-control m-2" ><?php echo htmlspecialchars($productDescription) ; ?></textarea>
          <div class="text-danger"><?php echo $errors['productDescription']; ?></div>

          <label for="price">price:</label>
            <input type="text" class="form-control m-2" placeholder="" aria-label=" price of product" name="price" value="<?php echo htmlspecialchars($price) ; ?>" required>
            <div class="text-danger"><?php echo $errors['price']; ?></div>
          

          <label for="VAT">VAT:</label>
            <input type="text" class="form-control m-2" placeholder=" " aria-label=" VAT" name="vat" value="<?php echo htmlspecialchars($vat) ; ?>" required>
            <div class="text-danger"><?php echo $errors['vat']; ?></div>
        

          <label for="total price">Total price:</label>
            <input type="text" class="form-control m-2" placeholder="" aria-label=" total price" name="totalPrice" value="<?php echo htmlspecialchars($totalPrice) ; ?>" required>
            <div class="text-danger"><?php echo $errors['totalPrice']; ?></div>
        

          <label for="profit">profit:</label>
            <input type="text" class="form-control m-2" placeholder=" " aria-label=" profit" name="profit" value="<?php echo htmlspecialchars($profit) ; ?>" required>
            <div class="text-danger"><?php echo $errors['profit']; ?></div>
          

          <label for="commission">commission:</label>
            <input type="text" class="form-control m-2" placeholder=" " aria-label="commission" name="commission" value="<?php echo htmlspecialchars($commission) ; ?>" required>
            <div class="text-danger"><?php echo $errors['commission']; ?></div>
          

          <label for="status">status:</label>
            <input type="text" class="form-control m-2" placeholder=" " aria-label=" product status" name="status" value="<?php echo htmlspecialchars($status) ; ?>" required>
            <div class="text-danger"><?php echo $errors['status']; ?></div>
          

          <label for="featured">featured:</label>
            <input type="text" class="form-control m-2" placeholder=" " aria-label=" featured items" name="featured" value="<?php echo htmlspecialchars($featured) ; ?>" required>
            <div class="text-danger"><?php echo $errors['featured']; ?></div>
          

          <label for="category">category:</label>
            <input type="text" class="form-control m-2" placeholder=" " aria-label=" category of product" name="category" value="<?php echo htmlspecialchars($category) ; ?>" required>
            <div class="text-danger"><?php echo $errors['category']; ?></div>
        

          <label for="item code">itemCode:</label>
            <input type="text" class="form-control m-2" placeholder="" aria-label=" item code" name="itemCode" value="<?php echo htmlspecialchars($itemCode) ; ?>" required>
            <div class="text-danger"><?php echo $errors['itemCode']; ?></div>
        

          <label for="product image1">productImage1:</label>
          <input class="form-control" id="nationalid" type="file" name="productImage1" required>
          <div class="text-danger"><?php echo $errors['productImage1']; ?></div>

          <label for="product Image2">productImage2:</label>
          <input class="form-control" id="nationalid" type="file" name="productImage2" required>
          <div class="text-danger"><?php echo $errors['productImage2']; ?></div>

          <label for="product Image3">productImage3:</label>
          <input class="form-control" id="nationalid" type="file" name="productImage3" required>
         <div class="text-danger"><?php echo $errors['productImage3']; ?></div>

         <input class="m-4 btnq rounded-pill" type="submit" value="upload" name="upload" ></input>

         </form>
         </div>
      
       

         <!-- end of loading a product-->
       
        <!-- featured products-->
        
        
<!--end of slide for featured items-->

          <!--core values-->
       <br>
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