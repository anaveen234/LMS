<?php 
 session_start();
 ob_start();
 $server='localhost';
 $name='username of your phpmyadmin';
 $pass='your password';
 $dbname='your database name';
$con=mysqli_connect($server,$name,$pass,$dbname);
ob_end_flush();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="sdash_c.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>STUDENT DB</title>
</head>
<body ><div class="container-1" >
  
  <h2 >LMS Welcomes You...<i class="fa fa-handshake-o"></i></h2>
  <div id="name"> <?php 
   $lid=$_SESSION['lid'];
   $query2="SELECT studentname from `student` where lid='$lid' ";
   $q2=mysqli_query($con,$query2);
   $result=mysqli_fetch_array($q2);
   echo $result[0]; ?></div>
 
  <button class="dash" onclick="sli('d1','da1','da')" id="da">&#10094;</button>
  <button class="dash1" onclick="slid('d1','da','da1')" style="display: none" id="da1">&#10095;</button></div>
  <div class="container-2" id="d1" style="width: 0%">  
  <ul>
  <li><button class="btn" onclick="doo('vp')"><h5><i class="fa fa-user"></i> MY PROFILE</h5></button></li>
  <li><button class="btn" onclick="doo('vb')"><h5><i class="fa fa-circle"></i>MY QUERIES</h5></button></li>
  <li><button class="btn" id="home"><h5><i class="fa fa-home">HOME</i></h5></button></li>
  </ul>
  </div>
  <div class="container1" id="ho" style="display: none">
  </div>
  <div class="container" id="vp" style="display: none">
      <form method="post" enctype="multipart/form-data" action="https://mylms234.000webhostapp.com/log.php">
      <h3>MY PROFILE</h3>
      <button class="butn"  id="vpbut" type="submit" name="mpsub"><h6>VIEW PROFILE</h6></button></form>
     </div>
  <div class="container mq" id="vb" style="display: none">
      <form method="post" enctype="multipart/form-data" action="https://mylms234.000webhostapp.com/log.php">
      <h3>MY QUERIES</h3>
      <div class="quote"><h1 class="qu">&#8220;</h1></div>
      <p class="wq">Write a Query...<i class="fa fa-edit"></i> </p>
      
      <textarea rows="10" cols="35" id="ta" name="mquery" contenteditable="false"></textarea>
      <button class="butn sq" id="vdbut" type="submit" name="mqsub"><h6>SUBMIT QUERY</h6></button></form>
     </div>    
<script>
  function doo(btnid1) {
    var i;
    var x = document.getElementsByClassName("container");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
      }
      document.getElementById(btnid1).style.display = "block";
  }
  function sli(btnid1,btnid2,btnid3){
    document.getElementById(btnid1).style.width = "100%";
    document.getElementById(btnid2).style.left = "0%";
    document.getElementById(btnid2).style.top = "190px";
    document.getElementById(btnid3).style.display = "none";
    document.getElementById(btnid2).style.display = "block";
  }
  function slid(btnid1,btnid2,btnid3){
    document.getElementById(btnid1).style.width = "0%";
    document.getElementById(btnid2).style.display = "block";
    document.getElementById(btnid3).style.display = "none";
    var i;
    var x = document.getElementsByClassName("container");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
      }
  }
  document.getElementById("home").addEventListener("click",redirect);
  function redirect(){
      window.location="https://mylms234.000webhostapp.com";}
  
 
</script>


</body>

</html>