<?php
function connect(){
$dbhost = 'mysql1.000webhost.com';
$dbuser = 'a2215729_root';
$dbpass = 'hello123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
$dbname = 'a2215729_reconsd';
mysql_select_db($dbname);
return $conn;
}
function close($conn){
    mysql_close($conn);
}


?>
