
<?php
$ticketId=$diagnosis=$challenges=$timeSpent=$message='';
$errors= array( 'ticketId'=>'',  'diagnosis'=>'', 'challenges'=>'', 'timeSpent'=>'');
if(isset($_POST['submit'])){

//check ticket ID number.
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
 //check diagnosis
 if(empty($_POST['diagnosis'])){
  $errors['diagnosis'] = ' description of the solution is required';
 }else{
  $diagnosis=$_POST['diagnosis'];
  if(!preg_match('/^[a-zA-Z\s]+$/' , $diagnosis)){
      $errors['diagnosis'] =  'description must be letters and spaces only';
  }
 }


 //check problems staff encountered
 if(empty($_POST['challenges'])){
  $errors['challenges'] = ' description of the challenges faced is required';
 }else{
  $challenges=$_POST['challenges'];
  if(!preg_match('/^[a-zA-Z\s]+$/' , $challenges)){
      $errors['challenges'] =  'description must be letters and spaces only';
  }
 }

 //check hours spent on job
 if(empty($_POST['timeSpent'])){
  $errors['timeSpent'] = ' hours spent is required';
 }else{
  $timeSpent=$_POST['timeSpent'];
  if(!preg_match('/^[0-9\s]+$/' , $timeSpent)){
      $errors['timeSpent'] =  'invalid time format';
  }
 }

if (array_filter($errors)){

}else{
 $message=' Success <i class="bi bi-check-circle"></i>';
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
    <div class="easyview text-center m-3">Site visit reports <?php echo $message ?></div>
  
   <!-- form for reports.-->
   <div class=" container text-center">

<form name="inquiry" action="afterstaffreports.php" method="POST" target="_self" accept-charset="utf-8" autocomplete="on" class="m-2 form1 rounded" enctype="multipart/form-data">


            <label for="ticket-ID">Ticket-ID:</label>
            <input type="text" class="form-control m-1" placeholder=" " aria-label=" THIS IS TICKET ID" name="ticketId" value="<?php echo htmlspecialchars($ticketId) ; ?>" maxlength="9" required>
            <div class="text-danger"><?php echo $errors['ticketId']; ?></div>

            <label for="Diagnosis">Diagnosis:</label>
            <textarea required name="diagnosis" class="form-control m-2" ><?php echo htmlspecialchars($diagnosis) ; ?></textarea>
            <div class="text-danger"><?php echo $errors['diagnosis']; ?></div>

            <label for="challenges">Challenges encountered:</label>
            <textarea required name="challenges" class="form-control m-2" ><?php echo htmlspecialchars($challenges) ; ?></textarea>
            <div class="text-danger"><?php echo $errors['challenges']; ?></div>


            <label for="time ">Time taken(hours):</label>
            <input type="text" class="form-control m-2" placeholder="" aria-label=" hours spent on the job" name="timeSpent" value="<?php echo htmlspecialchars($timeSpent) ; ?>" maxlength="3" required>
            <div class="text-danger"><?php echo $errors['timeSpent']; ?></div>

            <input class="m-4 btnq rounded-pill" type="submit" value="submit" name="submit" ></input>


</form>
</div>

<br><br><br><br><br><br><br><br>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <footer>
    <div class=" mb-0 pt-3 ps-5 container-fluid  d-flex justify-content-center " style="background-image: url(careerbgimg.JPG);"><P class="mt-3 text-light"><i class="bi bi-c-circle"></i>  2023 clockwave innovations and technical solutions ltd<br> All Rights Reserved</P> </div>
   
  </footer>
  </html>