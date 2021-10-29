<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script type="text/javascript">
 function countDown(secs,elem){
     var element = document.getElementById(elem);
     element.innerHTML = "Timer is "+secs+" Seconds";
     if(secs < 1){
         clearTimeout('timer');
         element.innerHTML = '<h2>CountDown Complete</h2>';
         
     }
     secs--;
     var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);
     
 }
</script>
<div id="status"></div>
<script type="text/javascript">countDown(180,"status");</script>
<form id="my_form" onsubmit="submitForm(); return false;" method="post">
    <p><label >Name:</label><input type="text" name="name" id="n" placeholder="Name" required></p>
    <p><label>Email:</label><input type="email" name="email" id="e" placeholder="Email Address" required></p>
    <p><label>Date Of Birth:</label><input type="dob" name="dob" id="d" placeholder="DOB" required></p>
    <div><label >About Yourself:</label></div>
    <textarea name="msg" name="msg" id="a" placehoder="About yourself"cols="30" rows="10" required></textarea>
    
    <div class="row">
        <div class="col-lg-9">
            <label>Captche</label>
            <input type="text" class="form-control" id="mobile" placeholder="Captcha" name="mobile">
        </div>
        <div class="col-lg-3">
           <img src="captcha.php" alt="">
        </div>
    </div>
    <p><input id="mybtn" type="submit" value="Submit Form"><span id="status"></span></p>
</form>
</body>
</html>
<?php
try{
    $db = new mysqli("localhost","root","","my_dummy_db");
}catch(Exception $exc){
echo $exc->getTraceAsString();
}
if(isset($_POST['name'])&& isset($_POST['email'])&& isset($_POST['dob'])&& isset($_POST['msg'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $msg = $_POST['msg'];

    $is_insert = $db->query("INSERT INTO `data`( `name`, `email`, `dob`, `msg`) VALUES ('$name','$email','$dob','$msg')");
    if($is_insert==true){
        echo "<h2>Thank you</h2>";
        exit();
    }
}
?>