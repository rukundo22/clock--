
<?php 
$ticketId=$problem=$clientName=$clientAddress=$clientContact=$staffId=$visitDate=$visitTime='';
$errors= array('ticketId' => '', 'problem'=>'', 'clientName'=>'', 'clientAddress'=>'','clientContact'=>'' ,'staffId'=>'','visitDate'=>'','visitTime'=>'' );
if(isset($_POST['upload'])) { 

    //check ticket id.
if(empty($_POST['ticketId'])){
    $errors['ticketId'] = 'ticket ID number is required ';
   }else{
    $ticketId=$_POST['ticketId'];
    $uppercase=preg_match('@[A-Z]@',$ticketId);
    $number=preg_match('@[0-9]@', $ticketId);
    if(!$uppercase || !$number || strlen($ticketId)>8 ){
        $errors['ticketId'] =  'invalid ticket ID number';
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

   //check problem
   if(empty($_POST['problem'])){
    $errors['problem'] = '  clients problem  is required';
   }else{
    $problem=$_POST['problem'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $problem)){
        $errors['problem'] =  'clients problem must be letters and spaces only';
    }
   }

   //check clients name
   if(empty($_POST['clientName'])){
    $errors['clientName'] = '  clients name  is required';
   }else{
    $clientName=$_POST['clientName'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $clientName)){
        $errors['clientName'] =  'clients name must be letters and spaces only';
    }
   }

   //check CLIENTS ADDRESS
   if(empty($_POST['clientAddress'])){
    $errors['clientAddress'] = '  clients address  is required';
   }else{
    $clientAddress=$_POST['clientAddress'];
    if(!preg_match('/^[a-zA-Z\s]+$/' , $clientAddress)){
        $errors['clientAddress'] =  'clients address must be letters and spaces only';
    }
   }

   //check clients contact
   if(empty($_POST['clientContact'])){
    $errors['clientContact'] = ' clients telephone number is required';
   }else{
    $clientContact=$_POST['clientContact'];
    if(!preg_match('/^[0-9\s]+$/' , $clientContact)){
        $errors['clientContact'] =  'invalid clients telephone number';
    }
   }

   //check visit date
   if(empty($_POST['visitDate'])){
    $errors['visitDate'] = ' visit date is required';
   }else{
    $visitDate=$_POST['visitDate'];
    
   }

   //check visit time
   if(empty($_POST['visitTime'])){
    $errors['visitTime'] = ' visit time is required';
   }else{
    $visitTime=$_POST['visitTime'];
    
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
    <div class="easyview text-center m-3">Ticket Details upload</div>
  
   <!-- form for reports.-->
   <div class=" container text-center">


   <form class="container justify-content-center signupform" name="tickets" action="afteradmintickets.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">


      <label for="ticket id">Ticket ID:</label>
      <input type="text" class="form-control m-2" placeholder="" name="ticketId" aria-label=" ticket id"  value="<?php echo htmlspecialchars($ticketId) ; ?>" required maxlength="9">
      <div class="text-danger"><?php echo $errors['ticketId']; ?></div>


      <label for="staff ID">staff ID:</label>
      <input type="text" class="form-control m-2" placeholder="" name="staffId" aria-label="staff id"  value="<?php echo htmlspecialchars($staffId) ; ?>" required maxlength="9">
      <div class="text-danger"><?php echo $errors['staffId']; ?></div>


      <label for="problem to solve">Problem:</label>
      <textarea required name="problem" class="form-control m-2" ><?php echo htmlspecialchars($problem) ; ?></textarea>
          <div class="text-danger"><?php echo $errors['problem']; ?></div>


      <label for="client's name">client's Name:</label>
      <input type="text" class="form-control m-2" placeholder="" aria-label=" client's Name" name="clientName"  value="<?php echo htmlspecialchars($clientName) ; ?>" required>
          <div class="text-danger"><?php echo $errors['clientName']; ?></div>
    
        <label for=" clients address">client's Address:</label>
          <input type=" text" class="form-control m-2" placeholder=" " aria-label="clients address" name="clientAddress"  value="<?php echo htmlspecialchars($clientAddress) ; ?>" required>
          <div class="text-danger"><?php echo $errors['clientAddress']; ?></div>
    
    
      <label for="client's contact">client's Contact:</label>
       <input type="text" class="form-control m-1" placeholder=" " aria-label=" This is client's contact" name="clientContact" value="<?php echo htmlspecialchars($clientContact) ; ?>" maxlength="15" required>
      <div class="text-danger"><?php echo $errors['clientContact']; ?></div>


            <label for="visit date">visit date:</label>
          <input type="date" class="form-control m-2" placeholder="" aria-label=" visit date" name="visitDate"  value="<?php echo htmlspecialchars($visitDate) ; ?>" required>
          <div class="text-danger"><?php echo $errors['visitDate']; ?></div>


          

          <label for="visit time">Time:</label>
          <input type="time" class="form-control m-2" placeholder="" aria-label=" visit time" name="visitTime"  value="<?php echo htmlspecialchars($visitTime) ; ?>" required maxlength="">
          <div class="text-danger"><?php echo $errors['visitTime']; ?></div>

          
          

          



    
    <div class=" d-flex justify-content-center">
       <input type="submit" class="signupbtn m-2 rounded-pill" name="upload" value="upload"><br>
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