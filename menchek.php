<?php

include 'common.php';
    if(isset($_POST["usernamecheck"])){
    
	$username = $_POST['usernamecheck'];
	$sql = "SELECT * FROM mentors WHERE username='$username'";
        $query = mysql_query($sql,connect()); 
        $uname_check = mysql_num_rows($query);
        if (strlen($username) < 3 || strlen($username) > 16) {
                echo '<strong style="color:#F00;">3 - 12 characters please</strong>';
                exit();
        }
            if (is_numeric($username[0])) {
                echo '<strong style="color:#F00;">It must begin with a letter</strong>';
                exit();
        }
        if ($uname_check < 1) {
                echo '<img src="images/accepted.png"><strong style="color:#009900;">OK</strong>';
                exit();
        } else {
                echo '<img src="images/rejected.png"><strong style="color:#F00;">Already taken</strong>';
                exit();
        }
}
?>
