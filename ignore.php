<?php
 include 'common.php';
 if(isset($_GET['sno'])){
     $sno=$_GET['sno'];
      $uname=$_GET['uname'];
      $type=$_GET['type'];
     $revquery=mysql_query("update messages set status='0' where serial='$sno'",connect());
              if($revquery) header('Location: members.php?uname='.$uname.'&&type='.$type);
 }
?>
