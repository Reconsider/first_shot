<?php
//used to coonect to database
function connect(){
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
$dbname = 'reconsder';
mysql_select_db($dbname);
return $conn;
}
function close($conn){
    mysql_close($conn);
}


?>
