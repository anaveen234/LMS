<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="dashboard_c.css">
    
    <title>ADMIN DB</title>
</head>
<body ><div class="container-1" >
  
  <h2 >Welcome to LMS&nbsp;<i class="fa fa-handshake-o"></i></h2>
  <p id="name">ADMIN</p>
 <button class="btn hb homeb " id="home"><i class="fa fa-home" style='font-size:30px;color:white'></i></button>
  <button class="dash" onclick="sli('d1','da1','da')" id="da">&#10094;</button>
  <button class="dash1" onclick="slid('d1','da','da1')" style="display: none" id="da1">&#10095;</button></div>
  <div class="container-2" id="d1" style="width: 0%">  
  <ul>
  <li><button class="btn" onclick="doo('vq')"><h5><i class="fa fa-eye"></i>VIEW QUERIES</h5></button></li>
  <li><button class="btn" onclick="doo('vs')"><h5><i class="fa fa-eye"></i>VIEW STUDENT</h5></button></li>
  <li><button class="btn" onclick="doo('vb')"><h5><i class="fas fa-book-open"></i>VIEW BOOKS</h5></button></li>
  <li><button class="btn" onclick="doo('ib')"><h5><i class="fas fa-stamp"></i>ISSUE BOOK</h5></button></li>
  <li><button class="btn" onclick="doo('ar')"><h5><i class="fa fa-undo"></i>ACCEPT RETURN</h5></button></li>
  <li><button class="btn" onclick="doo('ab')"><h5><i class="fa fa-book"></i><i class="fa fa-plus" style='font-size:15px;color:white'></i>ADD NEW BOOK</h5></button></li>
  <li><button class="btn" onclick="doo('as')"><h5><i class="fa fa-user-plus"></i>ADD NEW STUDENT</h5></button></li>
  <li></li>

  </ul>
  </div>
  <div class="container1" id="ho" style="display: none">
  
  </div>
  <div class="container" id="ab" style="display: none">
      <form method="post" enctype="multipart/form-data" action="https://mylms234.000webhostapp.com/addbook.php">
      <h3>ADD NEW BOOK</h3>
      <input class="add" type="text"  name="bid" placeholder="Book ID">
      <input class="add" type="text" name="bname" placeholder="Book name">
      <input class="add" type="text" name="aname" placeholder="Author">
      <input class="add" type="text" name="bquantity" placeholder="No. of Books">
      <button class="butn" type="submit" name="bsub"><h6 class="fab"><i class="fa fa-book" style='font-size:25px;color:white'></i><i class="fa fa-plus" style='font-size:15px;color:white'></i></h6></button></form>
  </div>
  <div class="container" id="as" style="display: none">
      <form method="post" enctype="multipart/form-data" action="addbook.php">
      <h3>ADD STUDENT</h3>
      <input class="add" type="text" name="sid" placeholder="Student ID">
      <input class="add" type="text" name="sname" placeholder="Student Name">
      <select class="add" id="se" name="sbranch">
        <option value="">Branch</option>
        <option value="CSE">CSE</option>
        <option value="CE">CE</option>
        <option value="ECE">ECE</option>
        <option value="EEE">EEE</option>
        <option value="MECH">MECH</option>
      </select>
      <select class="add" id="se" name="syear">
        <option value="">Year</option>
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="3rd">3rd</option>
        <option value="4th">4th</option>
      </select>
      <button class="butn" type="submit" name="ssub"><h6><i class="fa fa-book"></i><i class="fa fa-user-plus"></i></h6></button>
      </form>
  </div>
  <div class="container" id="ib" style="display: none">
      <form method="post" enctype="multipart/form-data" action="https://mylms234.000webhostapp.com/addbook.php">
      <h3>ISSUE BOOK</h3>
      <input class="add" type="text" name="sid" placeholder="Student ID" required="required">
      <input class="add" type="text" name="bid" placeholder="Book ID">
      <input class="add" type="date" id="se" name="idate"  placeholder=""/>
      <button class="butn" type="submit" name="ibsub"><h6><i class="fas fa-stamp"></i>ISSUE</h6></button></form>
      
  </div>
  <div class="container" id="ar" style="display: none">
    <form method="post" enctype="multipart/form-data" action="https://mylms234.000webhostapp.com/addbook.php">
    <h3>ACCEPT RETURN</h3>
    <input class="add" type="text" name="sid" placeholder="Student ID">
    <input class="add" type="text" name="bid" placeholder="Book ID">
    <button class="butn" type="submit" name="arsub"><h6>ACCEPT</h6></button></form>
</div> 
  <div class="container" id="vs" style="display: none">
      <form method="post" enctype="multipart/form-data" action="https://mylms234.000webhostapp.com/addbook.php">
      <h3>VIEW STUDENT</h3>
      <input class="add" type="text" name="sid" placeholder="Student ID">
      <button class="butn" type="submit" name="vssub"><h6><i class="fa fa-eye" style='font-size:25px;color:white'></i></h6></button></form>
     </div>
  <div class="container" id="vb" style="display: none">
      <form method="post" enctype="multipart/form-data" action="addbook.php">
      <h3>VIEW BOOKS</h3>
      <button class="butn" id="vbbut" type="submit" name="vbsub"><h6><i class="fa fa-eye" style='font-size:25px;color:white'></i></h6></button></form>
     </div>
     <div class="container"id="vq" style="display: none">
      <form method="post"enctype="multipart/form-data" action="addbook.php">
      <h3>VIEW QUERIES</h3>
      <button class="butn"type="submit" name="vqsub"><h6><i class="fa fa-eye" style='font-size:25px;color:white'></i></h6></button></form>
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