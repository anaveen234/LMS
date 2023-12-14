<?php ob_start();
$server='localhost';
$name='username of your phpmyadmin';
$pass='your password';
$dbname='your database name';
$con=mysqli_connect($server,$name,$pass,$dbname);
echo '<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>';
echo'<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
if(!$con){
    die('connection failed:'.mysqli_connect_error());
}else{
    if(isset($_POST['bsub'])){
        $bookid=$_POST['bid'];
        $bookname=$_POST['bname'];
        $authorname=$_POST['aname'];
        $quantity=$_POST['bquantity'];
        $query1="SELECT * FROM addbook WHERE bookid='$bookid'";
        $q1=mysqli_query($con,$query1);
        $r=mysqli_num_rows($q1);
        if($r==0){
            $query="INSERT INTO addbook values('$bookid','$bookname','$authorname','$quantity')";
            $q2=mysqli_query($con,$query);
             echo'<script type="text/javascript">
        $(document).ready(function() {
        swal({
        title: "BOOK ADDED",
        text: "'.$bookname.'('.$bookid.') added into library",
        icon: "success",
        button: "Ok",
        timer: 10000
    });
});
</script>';
            header("https://mylms234.000webhostapp.com/dashboard.php");
        }
        else{
           
            echo'<script type="text/javascript">
        $(document).ready(function() {
        swal({
        title: "BOOK EXISTS",
        text: "Please add another book.",
        icon: "info",
        button: "Ok",
        timer: 10000
    });
});
</script>';
        }
    }
    elseif(isset($_POST['ssub'])){
        
        $stuid=$_POST['sid'];
        $stuname=$_POST['sname'];
        $stubranch=$_POST['sbranch'];
        $stuyear=$_POST['syear'];
        $query="SELECT * FROM `student` WHERE studentid='$stuid'";
        $q=mysqli_query($con,$query);
        $n=mysqli_num_rows($q);
        if($n==0){
        $query2="INSERT into `student` values('$stuid',null,null,'$stuname','$stubranch','$stuyear',0,null)";
        $q2=mysqli_query($con,$query2);
        if(!$q2){
            echo 'hiuisj';
        }
        $query5="INSERT into issuebook values('$stuid','0','0','0','0','0','0','0','0')";
        $q5=mysqli_query($con,$query5);
        $query4="INSERT INTO `issuedates` values('$stuid','0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00')";
        $q4=mysqli_query($con,$query4);
        $query1="SELECT floor(rand()*(9999-1001+1))+1001 ";
        $q1=mysqli_query($con,$query1);
        $result=mysqli_fetch_array($q1);
        $r=$result[0];
        $query3="SELECT * from `student` where studentid='$stuid'";
        $q3=mysqli_query($con,$query3);
        $result1=mysqli_fetch_array($q3);
        $r1=$result1[1];
       $query5="UPDATE `student` set lid='S$r1$r' where studentid='$stuid'";
       $q5=mysqli_query($con,$query5);
       echo'<script type="text/javascript">
        $(document).ready(function() {
        swal({
        title: "STUDENT ADDED",
        text: "Student can now borrow books!!",
        icon: "success",
        button: "DONE",
        timer: 10000
    });
});
</script>';}
       else{
        echo'<script type="text/javascript">
        $(document).ready(function() {
        swal({
        title: "STUDENT EXISTS",
        text: "Please check your Student ID!!",
        icon: "error",
        button: "Check ID",
        timer: 10000
    });
});
</script>';
       }
    }
    elseif(isset($_POST['ibsub'])){
        $stuid=$_POST['sid'];
        $bookid=$_POST['bid'];
        $issuedate=$_POST['idate'];
        $date=new DateTime($issuedate);
        $date->modify('+7 day');
        $idate=$date->format('d-m-y');
        $query6="SELECT * FROM `student` WHERE studentid='$stuid'";
        $q6=mysqli_query($con,$query6);
        $r=mysqli_num_rows($q6);
        if($r==0){
            echo'<script type="text/javascript">
        $(document).ready(function() {
        swal({
        title: "UNREGISTERED STUDENT",
        text: "Please register Student to issue books!!",
        icon: "error",
        button: "Register",
        timer: 10000
    });
});
</script>';
        }
        elseif($r!=0){
            
                $query5="SELECT * from `issuebook` where studentid='$stuid'";
                $q5=mysqli_query($con,$query5);
                $result=mysqli_fetch_array($q5);
                $temp=9;
                for($t=1;$t<=8;$t++){ 
                if($result[$t]=='0'){
                    $temp=$t;
                    break;
                }}
                if($temp<=8){
                $query3="UPDATE `issuebook` set book$temp='$bookid'where studentid='$stuid'";
                $q3=mysqli_query($con,$query3);
                $query5="UPDATE `issuedates` set book$temp='$issuedate'where studentid='$stuid'";
                $q5=mysqli_query($con,$query5);
                $query4="UPDATE `student`set noib=noib+1 where studentid='$stuid'";
                $q4=mysqli_query($con,$query4);
                echo'<script type="text/javascript">
        $(document).ready(function() {
        swal({
        title: "BOOK ISSUED",
       text: "The book('.$bookid.') is to be returned by '.$idate.'!!",
        icon: "success",
        button: "Ok",
        timer: 10000
    });
});
</script>';
                header("https://mylms234.000webhostapp.com/dashboard.html"); 
            }
            else{
                echo'<script type="text/javascript">
        $(document).ready(function() {
        swal({
        title: "BOOK LIMIT EXCEEDED",
        text: "Please return some books to borrow other!!",
        icon: "info",
        button: "OK",
        timer: 10000
    });
});
</script>';
            }
            
            }
        }

    
    elseif(isset($_POST['vssub'])){
        $stuid=$_POST['sid'];
        $query3="SELECT * from `student`where studentid='$stuid' ";
        $q3=mysqli_query($con,$query3);
        $query2="SELECT * from `issuebook`where studentid='$stuid' ";
        $q2=mysqli_query($con,$query2);
        $book=mysqli_fetch_array($q2);
        $query4="SELECT * from `issuedates`where studentid='$stuid' ";
        $q4=mysqli_query($con,$query4);
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
        echo '<body><div class="container-4"><h7>BOOKS</h7>';
        echo '</body>';
        echo '<form method="post"enctype="multipart/form-data" action="">';
        echo '<head><link rel="stylesheet" href="temp2.css"><table class="table1" align="center" cellpadding="2" cellspacing="2"><tr>';
        echo '<th class="t1">STUDENT ID</th>';
        echo '<th class="t1">STUDENT NAME</th><th class="t1">BRANCH</th><th class="t1">YEAR</th><th class="t1">NO. OF BOOKS ISSUED</th>';
        echo '</tr>';
        while($result=mysqli_fetch_assoc($q3)){
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
    }
   
    elseif(isset($_POST['arsub'])){
        
        $stuid=$_POST['sid'];
        $bookid=$_POST['bid'];
        $query5="SELECT * from `issuebook` where studentid='$stuid'";
        $q5=mysqli_query($con,$query5);
        $result=mysqli_fetch_array($q5);
        $temp=9;
        for($t=1;$t<=8;$t++){ 
        if($result[$t]==$bookid){
            $temp=$t;
            break;
        }
        }
        if($temp>8){
            echo'<script type="text/javascript">
        $(document).ready(function() {
        swal({
        title: "LIMIT EXCEEDED",
        text: "Please RETURN some books to issue other",
        icon: "ERROR",
        button: "Ok",
        timer: 10000
    });
});
</script>';
        }
        else{
            $query4="UPDATE `issuebook`set book$temp='0'where studentid='$stuid'";
            $q4=mysqli_query($con,$query4);
            $query4="UPDATE `issuedates`set book$temp='0000-00-00'where studentid='$stuid'";
            $q4=mysqli_query($con,$query4);
            $query3="UPDATE `student` set noib=noib-1 where studentid='$stuid'";
            $q3=mysqli_query($con,$query3);
            echo'<script type="text/javascript">
        $(document).ready(function() {
        swal({
        title: "RETURN ACCEPTED",
        text: "The book('.$bookid.') is returned !!",
        icon: "success",
        button: "Ok",
        timer: 10000
    });
});
</script>';
            header("https://mylms234.000webhostapp.com/dashboard.html");
        }
    }
    elseif(isset($_POST['vbsub'])) {
    $query3="SELECT * from `addbook` ";
    $q3=mysqli_query($con,$query3);
    echo '<body><div class="container-4"><h7>BOOKS STOCK</h7>';
        echo '</body>';
        echo '<form method="post"enctype="multipart/form-data" action="">';
        echo '<head><link rel="stylesheet" href="temp2.css"><table class="table1" align="center" cellpadding="2" cellspacing="2"><tr>';
        echo '<th class="t1">BOOK ID</th>';
        echo '<th class="t1">BOOK NAME</th><th class="t1">AUTHOR NAME</th><th class="t1">NO. OF BOOKS</th>';
        echo '</tr>';
        while($result=mysqli_fetch_assoc($q3)){
                   echo "<tr>";
                   echo "<td>";echo $result['bookid'];echo "</td>";
                   echo "<td>";echo $result['bookname'];echo "</td>";
                   echo "<td>";echo $result['authorname'];echo "</td>";
                   echo "<td>";echo $result['no.ofbooks'];echo "</td>";
                   echo "</tr>";
        }echo '</table><br/><br/></head></form>';
}
elseif(isset($_POST['vqsub'])){
        $query="SELECT * from `queries`";
        $q=mysqli_query($con,$query);
        
        echo '<body><div class="container-4"><h7>STUDENT QUERIES</h7>';
        echo '</body>';
        echo '<form method="post"enctype="multipart/form-data" action="">';
        echo '<head><link rel="stylesheet" href="abc.css">';
        echo '<div class ="col">';
        while($row=$q->fetch_assoc()){
        echo '<div class="col1"><h3></br>&nbsp;&nbsp;&nbsp;';
        echo $row['studentid'];
        echo '<h3></div><div class="col2"><br/>&nbsp;&nbsp;&nbsp;';
        echo $row['query'];
        echo '</div>';}
    }echo '</div>';
}
ob_end_flush();
?>
