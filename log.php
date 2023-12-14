<?php ob_start();
session_start();
$host='localhost';
$user='username of your phpmyadmin';
$password='your password';
$db='your database name';
$conn = mysqli_connect($host, $user, $password,$db);

echo '<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>';
echo'<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
if(!$conn){
    die('connection failed:'.mysqli_connect_error());
}
if(isset($_POST['submit2'])){ 
    $stuid=$_POST['name'];
    $query1="SELECT * FROM student WHERE studentid='$stuid'";
    $q1=mysqli_query($conn,$query1);
    $result=mysqli_fetch_array($q1);
    $lid=$result['lid'];
    
    echo'<script type="text/javascript">
    $(document).ready(function() {
        swal({
            title: "The Library ID is",
            text: "'.$lid.'",
            icon: "info",
            button: "Ok",
            timer: 10000
        });
    });
</script>';
    
}
elseif(isset($_POST['submit1'])){
$libid=$_POST['libraryid'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$query1="SELECT * from student where lid='$libid'";
$q1=mysqli_query($conn,$query1);
$res=mysqli_fetch_array($q1);
$p=$res['spassword'];
if($p==null){
if($libid!=null){
    if($cpass==$pass){
$query="UPDATE student set spassword=$cpass where lid='$libid'";
$q=mysqli_query($conn,$query);
echo'<script type="text/javascript">
$(document).ready(function() {
    swal({
        title: "REGISTRATIION DONE",
        text: "You can now LOGIN with your Credentials",
        icon: "success",
        button: "Ok",
        timer: 10000
    });
});
</script>';
    }
    else{
        echo '<script>alert("PASSWORDS DO NOT MATCH \n Please check them and try again..!")</script>';
    }
}
else{
    echo '<script>alert("LIBRARY ID cannot be empty")</script>';
}
}
else{
    echo'<script>alert("you have already been registered")</script>';
}
}
elseif(isset($_POST['log'])){
    $libid=$_POST['lid'];
    $_SESSION['lid']=$libid;
    $pass=$_POST['lpass'];
    $query1="SELECT * from student where lid='$libid' and spassword='$pass'";
    $q1=mysqli_query($conn,$query1);
    $res=mysqli_fetch_array($q1); 
    $l=$res['lid'];
    if($l!=$libid){
        echo '<script>alert("The entered LID is not authenticated by ADMIN")</script>';
    }
    if($res!=null){
        header("Location:https://mylms234.000webhostapp.com/sdash.php");
    }  
    else{
        echo '<script>alert("please check your passwords")</script>';
    }
}
elseif(isset($_POST['alog'])){
    $admid=$_POST['admid'];
    $pass=$_POST['pass'];
    $query1="SELECT * from signup where username='$admid' and password='$pass'";
    $q1=mysqli_query($conn,$query1);
    $res=mysqli_fetch_array($q1); 
    $l=$res['username'];
    if($l!=$admid){
        echo '<script>alert("You are not auththorised ADMIN")</script>';
    }
    if($res!=null){
        header("Location:https://mylms234.000webhostapp.com/dashboard.php");
    }  
    else{
        echo '<script>alert("please check your passwords")</script>';
    }
}
elseif(isset($_POST['mqsub'])){
    $response=$_POST['mquery'];
    $lib1=$_SESSION['lid'];
    $query3="SELECT studentid from `student` where lid='$lib1' ";
        $q3=mysqli_query($conn,$query3);
        $result=mysqli_fetch_array($q3);
        $stuid=$result[0];
        $query4="INSERT into `queries` values('$stuid','$response') ";
        $q4=mysqli_query($conn,$query4);
        if($response!=null){
            echo'<script type="text/javascript">
            $(document).ready(function() {
                swal({
                    title: "QUERY SENT",
                    text: "Check after a while for the response",
                    icon: "success",
                    button: "Ok",
                    timer: 10000
                });
            });
            </script>';
                }
                else{
                    echo'<script type="text/javascript">
            $(document).ready(function() {
                swal({
                    title: "EMPTY QUERY",
                    text: "Please submit after writing something",
                    icon: "info",
                    button: "Ok",
                    timer: 10000
                });
            });
            </script>';
                }
        }
elseif(isset($_POST['mpsub'])){
    $lib1=$_SESSION['lid'];
        $query3="SELECT * from `student` where lid='$lib1' ";
        $q3=mysqli_query($conn,$query3);
        $result=mysqli_fetch_array($q3);
        $stuid= $result['studentid'];
        $query2="SELECT * from `issuebook`where studentid='$stuid' ";
        $q2=mysqli_query($conn,$query2);
        $book=mysqli_fetch_array($q2);
        $query4="SELECT * from `issuedates`where studentid='$stuid' ";
        $q4=mysqli_query($conn,$query4);
        $issue=mysqli_fetch_array($q4);
        $issue2=array();
        $books=array();
        $return=array();
        $book2=array();
       
        for($i=1;$i<9;$i++){
            if($issue[$i]!='0000-00-00'){
            $issue2[$i]=new DateTime($issue[$i]);
            $issue2[$i]=$issue2[$i]->format('d-m-y');
         }
         else{
            $issue2[$i]='-';
         }
        }
        for($i=1;$i<9;$i++){
            if($issue[$i]=='0000-00-00'){
                $return[$i]=$issue2[$i];
            }
            else{   
                $books[$i]=new DateTime($issue[$i]);
                $books[$i]->modify('+7 day');
                $return[$i]=$books[$i]->format('d-m-y');
            }
        }
        echo '<body><div class="container-4"><h7>MY PROFILE</h7>';
        echo '</body>';
        echo '<form method="post"enctype="multipart/form-data" action="">';
        echo '<head><link rel="stylesheet" href="temp2.css"><table class="table1" align="center" cellpadding="2" cellspacing="2"><tr>';
        echo '<th class="t1">STUDENT ID</th>';
        echo '<th class="t1">STUDENT NAME</th><th class="t1">BRANCH</th><th class="t1">YEAR</th><th class="t1">NO. OF BOOKS ISSUED</th>';
        echo '</tr>';
                   echo "<tr>";
                   echo "<td>";echo $result['studentid'];echo "</td>";
                   echo "<td>";echo $result['studentname'];echo "</td>";
                   echo "<td>";echo $result['branch'];echo "</td>";
                   echo "<td>";echo $result['year'];echo "</td>";
                   echo "<td>";echo $result['noib'];echo "</td>";
                   echo "</tr>";
                   echo '</table>';
        echo '<table class="table2" align="center"  cellpadding="2" cellspacing="2"><tr>';
        echo '<th>BOOK</th>';
        echo '<th>BOOK ID</th>';echo '<th>ISSUE DATE</th>';echo '<th>RETURN DATE</th>';echo '<th>FINE</th>';
        for($i=1;$i<9;$i++){
            echo "<tr>";echo "<td>BOOK$i</td>";echo "<td>";echo $book['book'.$i.''];echo "</td>";
        echo "<td>";echo $issue2[$i];echo "</td>";echo "<td>";echo $return[$i];echo "</td>";echo "<td>";echo '0';echo "</td>";echo "</tr>";
        }
        }echo '</table><br/><br/></head></form>';


ob_end_flush();
?>

