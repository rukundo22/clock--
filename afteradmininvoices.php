<?php 
$clientNames=$invoiceNumber=$invoiceDate=$item=$quantity=$unitPrice=$totalPrice=$subTotal=$figureTotal=$item1=$quantity1=$unitPrice1=$totalPrice1=$item2=$quantity2=$unitPrice2=$totalPrice2=$item3=$quantity3=$unitPrice3=$totalPrice3=$item4=$quantity4=$unitPrice4=$totalPrice4=$item5=$quantity5=$unitPrice5=$totalPrice5=$item6=$quantity6=$unitPrice6=$totalPrice6=0;
$clientId=$invoiceId=$invoice=$points='';
$errors= array('clientNames' => '', 'invoiceNumber'=>'', 'invoiceDate'=>'', 'item1'=>'','quantity1'=>'' ,'unitPrice1'=>'','totalPrice1'=>'','subTotal'=>'','figureTotal'=>'', 'item6'=>'','quantity6'=>'' ,'unitPrice6'=>'','totalPrice6'=>'', 'item2'=>'','quantity2'=>'' ,'unitPrice2'=>'','totalPrice2'=>'', 'item3'=>'','quantity3'=>'' ,'unitPrice3'=>'','totalPrice3'=>'', 'item4'=>'','quantity4'=>'' ,'unitPrice4'=>'','totalPrice4'=>'', 'item5'=>'','quantity5'=>'' ,'unitPrice5'=>'','totalPrice5'=>'','clientId'=>'','invoiceId'=>'','invoice'=>'','points'=>'' );


if(isset($_POST['generate'])){
   
//below are values that change

   $item1=$_POST['item1'];
   $quantity1=$_POST['quantity1'];
   $unitPrice1=$_POST['unitPrice1'];
   $totalPrice1=($unitPrice1 * $quantity1);
   
   $item2=$_POST['item2'];
   $quantity2=$_POST['quantity2'];
   $unitPrice2=$_POST['unitPrice2'];
   $totalPrice2=($unitPrice2 * $quantity2);
   
   $item3=$_POST['item3'];
   $quantity3=$_POST['quantity3'];
   $unitPrice3=$_POST['unitPrice3'];
   $totalPrice3=($unitPrice3 * $quantity3);
   
   $item4=$_POST['item4'];
   $quantity4=$_POST['quantity4'];
   $unitPrice4=$_POST['unitPrice4'];
   $totalPrice4=($unitPrice4 * $quantity4);
   
   $item5=$_POST['item5'];
   $quantity5=$_POST['quantity5'];
   $unitPrice5=$_POST['unitPrice5'];
   $totalPrice5=($unitPrice5 * $quantity5);
   
   $item6=$_POST['item6'];
   $quantity6=$_POST['quantity6'];
   $unitPrice6=$_POST['unitPrice6'];
   $totalPrice6= ($unitPrice6 * $quantity6);

 //below are values that dont change
   $clientNames=$_POST['clientNames'];
   $invoiceNumber=$_POST['invoiceNumber'];
   $invoiceDate=$_POST['invoiceDate'];
   $figureTotal=($totalPrice1 + $totalPrice2 + $totalPrice3 + $totalPrice4 + $totalPrice5 + $totalPrice6) ;
   $subTotal=$_POST['subTotal'];

   //fomulae
//$totalPrice1= ($unitPrice1 * $quantity1);
//$totalPrice2=($unitPrice2 * $quantity2);
//$totalPrice3=($unitPrice3 * $quantity3);
//$totalPrice4=($unitPrice4 * $quantity4);
//$totalPrice5=($unitPrice5 * $quantity5);
//$totalPrice6=$unitPrice6 * $quantity6;


//$figureTotal=($totalPrice1 + $totalPrice2 + $totalPrice3 + $totalPrice4 + $totalPrice5 + $totalPrice6) ;

   

}

if(isset($_POST['upload'])){

 //checking for upload invoice. 
 $files=$_FILES['invoice'];
  
 $fileName=$files['name'];
 $fileSize=$files['size'];
 $fileLocation=$files['tmp_name'];
 $fileErrors=$files['error'];
 $fileFullpath=$files['full_path'];
 $fileType=$files['type'];
 
 $splitfile= explode('.',$fileName);
 
  
 $fileExtention=strtolower($splitfile[1]);
 
 $allowedExtentions=array('pdf','','');
 
 if(in_array($fileExtention,$allowedExtentions) )
 { 
  if($fileSize<4000000){
    $errors['invoice']= '' ;}else{
      $errors['invoice']= ' file must be less than 4mbs !' ;
    }
  
 }else{
  $errors['invoice']='file not supported' ;
 }
 //check points
 if(empty($_POST['points'])){
   $errors['points'] = 'points is required';
  }else{
   $points=$_POST['points'];
   if(!preg_match('/^[0-9\s]+$/' , $points)){
       $errors['points'] =  ' points must be in digits';
   }
  }
  //clients id check
 if(empty($_POST['clientId'])){
   $errors['clientId'] = 'client id is required';
  }else{
   $clientId=$_POST['clientId'];
   if(!preg_match('/^[0-9\s]+$/' , $clientId)){
       $errors['clientId'] =  ' client id  must be in digits';
   }
  }

  //check invoice id
 if(empty($_POST['invoiceId'])){
   $errors['invoiceId'] = 'invoice id is required';
  }else{
   $invoiceId=$_POST['invoiceId'];
   if(!preg_match('/^[0-9\s]+$/' , $invoiceId)){
       $errors['invoiceId'] =  ' invoice id must be in digits';
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
   <div class="text-center h2"><a href="admin.php" class=" links"><i class="bi bi-arrow-left-circle-fill "></i> back </a></div>
   <br><br>
   <!-- INVOICE GENERATION-->
    <div class="easyview text-center m-3">Generate and upload invoice</div>
  
   
   <div class=" container text-center">


   <form class="container justify-content-center signupform" name="genInvoice" action="afteradmininvoices.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">
 
   <!--company logo and name.-->
   <div class="container border-1 my-2  d-flex flex-row   justify-content-center"> 
               
              <img class=" logo rounded-circle m-2 col-4 " src="logo.JPG" alt="logo" id="" >
              <div class=" m-2 mt-lg-4 b-lg-2  text-center h4 colorcompanyname  justify-content-center align-content-center " id="indexlogoname" ><p >clockwave innovations and <br>technical solutions ltd</p></div>
        
        </div>
 <!--end of company logo and name.-->

        <div class="row" id="flexform">

        <div class="col">
      <label for="client full name">Bill To:</label>
      <input type="text" class="form-control m-2" placeholder="" name="clientNames" aria-label=" client full names"  value="<?php echo htmlspecialchars($clientNames) ; ?>" required maxlength="100">
      <div class="text-danger"><?php echo $errors['clientNames']; ?></div>
      </div>

      <div class="col">
      <label for="invoice number">Invoice Number:</label>
      <input type="text" class="form-control m-1" placeholder="" name="invoiceNumber" aria-label="invoice number"  value="<?php echo htmlspecialchars($invoiceNumber) ; ?>" required maxlength="9">
      <div class="text-danger"><?php echo $errors['invoiceNumber']; ?></div>

      <label for="invoice date"> Date:</label>
          <input type="date" class="form-control m-1" placeholder="" aria-label=" invoice date" name="invoiceDate"  value="<?php echo htmlspecialchars($invoiceDate) ; ?>" required>
          <div class="text-danger"><?php echo $errors['invoiceDate']; ?></div>
      </div>

      </div>

      <div class="">
        <table>
            <tr>
         <th>Item/description</th>
         <th>Quantity</th>
         <th>Unit price</th>
         <th>Total price</th>
         </tr>

         <tr>
         <td>
         <label for="item or description"></label>
      <textarea  name="item6" class="form-control m-2" ><?php echo htmlspecialchars($item6) ; ?></textarea>
          <div class="text-danger"><?php echo $errors['item6']; ?></div>
         </td>

         <td>
         <label for="Quantity"></label>
      <input type="text" class="form-control m-2" placeholder="" aria-label=" quantity" name="quantity6"  value="<?php echo htmlspecialchars($quantity6) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['quantity6']; ?></div>
         </td>

         <td>
          <label for=" unit price"></label>
          <input type=" text" class="form-control m-2" placeholder=" " aria-label="unit price" name="unitPrice6"  value="<?php echo htmlspecialchars($unitPrice6) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['unitPrice6']; ?></div>
          </td>

         <td>
         <label for="total price"></label>
       <input type="text" class="form-control m-1" placeholder=" " aria-label=" total price" name="totalPrice6" value="<?php echo htmlspecialchars($totalPrice6) ; ?>" maxlength="15">
      <div class="text-danger"><?php echo $errors['totalPrice6']; ?></div>

         </td>
        </tr>

        <!--row two-->
        <tr>
         <td>
         <label for="item or description"></label>
      <textarea  name="item1" class="form-control m-2" ><?php echo htmlspecialchars($item1) ; ?></textarea>
          <div class="text-danger"><?php echo $errors['item1']; ?></div>
         </td>

         <td>
         <label for="Quantity"></label>
      <input type="text" class="form-control m-2" placeholder="" aria-label=" quantity" name="quantity1"  value="<?php echo htmlspecialchars($quantity1) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['quantity1']; ?></div>
         </td>

         <td>
          <label for=" unit price"></label>
          <input type=" text" class="form-control m-2" placeholder=" " aria-label="unit price" name="unitPrice1"  value="<?php echo htmlspecialchars($unitPrice1) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['unitPrice1']; ?></div>
          </td>

         <td>
         <label for="total price"></label>
       <input type="text" class="form-control m-1" placeholder=" " aria-label=" total price" name="totalPrice1" value="<?php echo htmlspecialchars($totalPrice1) ; ?>" maxlength="15">
      <div class="text-danger"><?php echo $errors['totalPrice1']; ?></div>

         </td>
        </tr>
        
        <!--row three-->
        <tr>
         <td>
         <label for="item or description"></label>
      <textarea  name="item2" class="form-control m-2" ><?php echo htmlspecialchars($item2) ; ?></textarea>
          <div class="text-danger"><?php echo $errors['item2']; ?></div>
         </td>

         <td>
         <label for="Quantity"></label>
      <input type="text" class="form-control m-2" placeholder="" aria-label=" quantity" name="quantity2"  value="<?php echo htmlspecialchars($quantity2) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['quantity2']; ?></div>
         </td>

         <td>
          <label for=" unit price"></label>
          <input type=" text" class="form-control m-2" placeholder=" " aria-label="unit price" name="unitPrice2"  value="<?php echo htmlspecialchars($unitPrice2) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['unitPrice2']; ?></div>
          </td>

         <td>
         <label for="total price"></label>
       <input type="text" class="form-control m-1" placeholder=" " aria-label=" total price" name="totalPrice2" value="<?php echo htmlspecialchars($totalPrice2) ; ?>" maxlength="15">
      <div class="text-danger"><?php echo $errors['totalPrice2']; ?></div>

         </td>
        </tr>

        <!--row four-->
        <tr>
         <td>
         <label for="item or description"></label>
      <textarea  name="item3" class="form-control m-2" ><?php echo htmlspecialchars($item3) ; ?></textarea>
          <div class="text-danger"><?php echo $errors['item3']; ?></div>
         </td>

         <td>
         <label for="Quantity"></label>
      <input type="text" class="form-control m-2" placeholder="" aria-label=" quantity" name="quantity3"  value="<?php echo htmlspecialchars($quantity3) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['quantity3']; ?></div>
         </td>

         <td>
          <label for=" unit price"></label>
          <input type=" text" class="form-control m-2" placeholder=" " aria-label="unit price" name="unitPrice3"  value="<?php echo htmlspecialchars($unitPrice3) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['unitPrice3']; ?></div>
          </td>

         <td>
         <label for="total price"></label>
       <input type="text" class="form-control m-1" placeholder=" " aria-label=" total price" name="totalPrice3" value="<?php echo htmlspecialchars($totalPrice3) ; ?>" maxlength="15">
      <div class="text-danger"><?php echo $errors['totalPrice3']; ?></div>

         </td>
        </tr>

        <!--row five-->
        <tr>
         <td>
         <label for="item or description"></label>
      <textarea  name="item4" class="form-control m-2" ><?php echo htmlspecialchars($item4) ; ?></textarea>
          <div class="text-danger"><?php echo $errors['item4']; ?></div>
         </td>

         <td>
         <label for="Quantity"></label>
      <input type="text" class="form-control m-2" placeholder="" aria-label=" quantity" name="quantity4"  value="<?php echo htmlspecialchars($quantity4) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['quantity4']; ?></div>
         </td>

         <td>
          <label for=" unit price"></label>
          <input type=" text" class="form-control m-2" placeholder=" " aria-label="unit price" name="unitPrice4"  value="<?php echo htmlspecialchars($unitPrice4) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['unitPrice4']; ?></div>
          </td>

         <td>
         <label for="total price"></label>
       <input type="text" class="form-control m-1" placeholder=" " aria-label=" total price" name="totalPrice4" value="<?php echo htmlspecialchars($totalPrice4) ; ?>" maxlength="15">
      <div class="text-danger"><?php echo $errors['totalPrice4']; ?></div>

         </td>
        </tr>
        <!--row six-->
        <tr>
         <td>
         <label for="item or description"></label>
      <textarea  name="item5" class="form-control m-2" ><?php echo htmlspecialchars($item5) ; ?></textarea>
          <div class="text-danger"><?php echo $errors['item5']; ?></div>
         </td>

         <td>
         <label for="Quantity"></label>
      <input type="text" class="form-control m-2" placeholder="" aria-label=" quantity" name="quantity5"  value="<?php echo htmlspecialchars($quantity5) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['quantity5']; ?></div>
         </td>

         <td>
          <label for=" unit price"></label>
          <input type=" text" class="form-control m-2" placeholder=" " aria-label="unit price" name="unitPrice5"  value="<?php echo htmlspecialchars($unitPrice5) ; ?>" maxlength="10">
          <div class="text-danger"><?php echo $errors['unitPrice5']; ?></div>
          </td>

         <td>
         <label for="total price"></label>
       <input type="text" class="form-control m-1" placeholder=" " aria-label=" total price" name="totalPrice5" value="<?php echo htmlspecialchars($totalPrice5) ; ?>" maxlength="15">
      <div class="text-danger"><?php echo $errors['totalPrice5']; ?></div>

         </td>
        </tr>
        <!--total price-->
        <tr>
         <td>
         
         </td>

         <td>
         
         </td>

         <td>
          <label for=" sub total"></label>
          <input type=" text" class="form-control m-2" placeholder=" " aria-label="sub total" name="subTotal"  value="Sub total" maxlength="10">
          <div class="text-danger"><?php echo $errors['subTotal']; ?></div>
          </td>

         <td>
         <label for="figure of sub total"></label>
       <input type="text" class="form-control m-1" placeholder=" " aria-label=" figure of sub total" name="figureTotal" value="<?php echo htmlspecialchars($figureTotal) ; ?>" maxlength="15">
      <div class="text-danger"><?php echo $errors['figureTotal']; ?></div>

         </td>
        </tr>

        </table>
      </div>

    
    <div class=" d-flex justify-content-center">
       <input type="submit" class="signupbtn m-2 rounded-pill" name="generate" value="Generate"><br>
    </div>
</form>

            
</div>

  <!-- INVOICE UPLOAD-->
  <div class="easyview text-center m-3">upload invoice</div>
  
   
  <div class=" container text-center">


  <form class="container justify-content-center signupform" name="upInvoice" action="afteradmininvoices.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">

  <label for="invoice id">invoice ID:</label>
            <input type="text" class="form-control m-2" placeholder="" aria-label="invoice ID" name="invoiceId" value="<?php echo htmlspecialchars($invoiceId) ; ?>" required maxlength="15">
            <div class="text-danger"><?php echo $errors['invoiceId']; ?></div>

  <label for="clients id">client ID:</label>
            <input type="text" class="form-control m-2" placeholder="" aria-label="client ID" name="clientId" value="<?php echo htmlspecialchars($clientId) ; ?>" required maxlength="15">
            <div class="text-danger"><?php echo $errors['clientId']; ?></div>

  <label for="clients points">points:</label>
            <input type="text" class="form-control m-2" placeholder=" " aria-label="clients points" name="points" value="<?php echo htmlspecialchars($points) ; ?>" required maxlength="9">
            <div class="text-danger"><?php echo $errors['points']; ?></div>
  
  <label>upload invoice (pdf)</label>
  <input class="form-control" id="academicdoc" type="file" name="invoice" required>
      <div class="text-danger"><?php echo $errors['invoice']; ?></div>

      <input class="m-4 btnq rounded-pill" type="submit" value="upload" name="upload" ></input>

  </form>
  </div>

<br><br><br><br><br>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <footer>
    <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center " style="background-image: url(careerbgimg.JPG);"><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
   
  </footer>
  </html>