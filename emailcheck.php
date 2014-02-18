<html>
<?php
include_once 'common.php';
$username=$_GET['q'];
$sqluser="SELECT email FROM users where email='$username'";
$result = mysql_query($sqluser,connect());
$count=  mysql_num_rows($result);
//while($row = mysql_fetch_array($result))
//    {
//        $usernametemp=$row["email"];
//        if($username==$usernametemp)
//        {
//            echo '<img src=images/rejected.png>Already Exist !!';
//            $count++;
//        }
//    }
    if($count==0)
        {
          echo '<img src=img/images/accepted.png>Available';
      //     break;
        }  
     else echo '<img src=img/images/rejected.png>Already Exist';
    
mysql_close(connect());?>
</html>

