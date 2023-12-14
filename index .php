<html>
<head>
    <title>CREDENTIALS</title>
    <link rel="stylesheet" href="index_c.css">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body >
    <div class="anim" id="banner">
        <div class="cred" id="c"><h7 id="h7">CREDENTIALS <i class="fa fa-id-card"></i></h7></div>
        <div id="toggle">
            <button class="anim1" id="a1"><h5 style="display:none" id="st">STUDENT</h5>
            <h6  id="a">ADMIN</h6></button>
        <button class="anim2" id="a2" style="display:none" onclick="sl('a3','admform')"></button>
        <button class="anim3" id="a3" onclick="al('a2','sf')"></button>
    </div>
        <button class="anim4" id="a4" onclick="drag()"><h8>&#65085</h8></button>
    
    </div>
    <div class="log" id="sf" style="display: none;">
    <div class="container" id="cont1" >
     <div class="s" id="su"><h1 >SIGN UP!</h1></div>
      <div class="r" id="rl" style="display:none"><h1>REQUEST LID!</h1></div>
    <div class="x">   
        <form id="" method="POST" enctype="multipart/form-data" action="log.php">
            <input type="text" id="sid" class="add" name="name" style="display:none" placeholder="Student ID" />
            <input type="text" id="lid" class="add" name="libraryid"  placeholder="Library ID" />
            <input type="password" class="add" id="sp" name="pass" placeholder="Set Password" />
            <input type="password" class="add" id="cp" name="cpass" placeholder="Confirm Password" />
        <button class="btn1" type="submit" id="reg" name="submit1" ><h3>REGISTER</h3></button>
        <button class="btn4" type="submit" id="rq" name="submit2" style="display:none"><h3>REQUEST</h3></button></form> 
        <button class="btn2" id="dlid" onclick="doo()"><h3>DON'T HAVE LID?</h3></button>
        <button class="btn3" id="bbtn" onclick="doo1()" style="display:none"><h3>BACK</h3></button>
        </div></div>
        <div class="signup" id="cont2" >
            <form id="" method="POST" enctype="multipart/form-data" action="log.php">
            <h2>LOGIN!</h2>
           <div class="sin"> <input type="text" class="add1" name="lid" placeholder="Library ID" />
            <input type="password" class="add1" name="lpass" placeholder="Password"/></div>
            <button type="submit" class="lo" name="log"><h4>LOGIN</h4></button>    
            </form>
        </div></div>
        <div class="admlog" style="" id="admform">
            <form id="" method="POST" enctype="multipart/form-data" action="log.php">
            <h2>ADMIN LOGIN!</h2>
           <div class="sin"> <input type="text" class="add1" name="admid" placeholder="ADMIN ID" />
            <input type="password" class="add1" name="pass" placeholder="PASSWORD"/></div>
            <button type="submit" class="lo" name="alog"><h4>LOGIN</h4></button>    
            </form>
        </div>
    <script>
        function doo(){
            
            document.getElementById("dlid").style.display="none";
            document.getElementById("lid").style.display="none";
            document.getElementById("sp").style.display="none";
            document.getElementById("cp").style.display="none";
            document.getElementById("su").style.display="none";
            document.getElementById("reg").style.display="none";
            document.getElementById("rl").style.display="block";
            document.getElementById("sid").style.display="block";
            document.getElementById("bbtn").style.display="block";
            document.getElementById("rq").style.display="block";
        }
        function doo1(){
            
            document.getElementById("dlid").style.display="block";
            document.getElementById("lid").style.display="block";
            document.getElementById("sp").style.display="block";
            document.getElementById("cp").style.display="block";
            document.getElementById("su").style.display="block";
            document.getElementById("reg").style.display="block";
            document.getElementById("bbtn").style.display="none";
            document.getElementById("sid").style.display="none";
            document.getElementById("rl").style.display="none";
            document.getElementById("rq").style.display="none";
        }
        function sl(btnid1,btnid2){
            document.getElementById(btnid1).style.display="block";
            document.getElementById(btnid2).style.display="block";
            document.getElementById("sf").style.display="none";
            document.getElementById("a").style.display="block";
            document.getElementById("a2").style.display="none";
            document.getElementById("st").style.display="none";
        }
        function al(btnid1,btnid2){
            document.getElementById(btnid1).style.display="block";
            document.getElementById(btnid2).style.display="block";
            document.getElementById("admform").style.display="none";
            document.getElementById("a3").style.display="none";
            document.getElementById("st").style.display="block";
            document.getElementById("a").style.display="none";
        }
        function drag(){
            document.getElementById("banner").style.height="22vh";
            document.getElementById("toggle").style.marginTop="18vh";
            document.getElementById("cont1").style.marginTop="18vh";
            document.getElementById("cont2").style.marginTop="18vh";
            document.getElementById("admform").style.marginTop="18vh";
            document.getElementById("c").style.marginTop="13vh";
            document.getElementById("a4").style.display="none";
            document.getElementById("h7").style.fontSize="7vh";
           
           
        }
    </script></body>
    </html>