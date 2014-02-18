<?php
    include 'common.php';
    if(isset($_POST['send'])){
        $sender=$_POST['sender'];
        $receiver=$_POST['receiver'];
        $replymsg=$_POST['replymsg'];
        $type=$_POST['type'];
        $status='1';
        $querysno = "SELECT max(serial) FROM messages";
                $result=mysql_query($querysno,connect());
                $val=mysql_fetch_array($result);
                $sno= $val['max(serial)'];
                $serial = $sno+1;
           $query=mysql_query("insert into messages values($serial,'$sender','$receiver','$status','$replymsg',now())",connect());
           if($query){
               $revquery=mysql_query("update messages set status='0' where serial='$rsn'",connect());
              if($revquery) header('Location: members.php?uname='.$sender.'&&type='.$type);
           }
    }
    
?>

