<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="scripts/script.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="lib/jquery.autocomplete_geomod.js"></script>
        <script type="text/javascript" src="lib/geo_autocomplete.js"></script>
        <link rel="stylesheet" type="text/css" href="style/jquery.autocomplete.css" />
		<link rel="stylesheet" type="text/css" href="style/register.css"/>
        <script type="text/javascript" src="scripts/register.js"></script>
		<script src="scripts/ajax.js"></script>
<style type="text/css">
.ac_results li img {
	float: left;
	margin-right: 5px;
}
</style>
        
</head>
    <body>
<?php      
	 $out=' <div>
            
            <form action="register.php" method="POST">
               <table>
                   <tr>
                       <td>Title</td>
                       <td class="opt">: <input type="radio" name="gender" id="gender" value="Mr." checked>Mr.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <input type="radio" name="gender" id="gender" value="Ms.">Ms.&nbsp;&nbsp;&nbsp;&nbsp;
                           <input type="radio" name="gender" id="gender" value="Mrs.">Mrs.&nbsp;&nbsp;&nbsp;&nbsp;
                       </td>
                   </tr>
                   <tr>
                       <td>Full Name</td>
                       <td>: <input type="text" name="fname" id="fname" placeholder="Full Name" class="names" onkeypress="return alpha(event)" required></td>
                   </tr>
                   <tr>
                       <td>Username</td>
                       <td>: <input type="text" name="username" id="username" placeholder="Username" class="names" onblur="checkusername()" onkeypress="return uname(event)" maxlength="12" required></td>
                       <td><div id="unamestatus" class="desc"></div></td>
					</tr>
					<tr>
					<td></td>
					<td>
                <span style="font-size:12px;font-weight: lighter;">(only numbers and alphabets)</span></td>
                   </tr>
                   <tr>
                       <td>E-mail</td>
                       <td>: <input type="text" name="email" id="email" autocomplete="off" placeholder="Your E-Mail" class="signup" onChange="return checkmail()" required></td>
					   <td><div id="emailcheck" class="desc"></div></td>
                   </tr>
                   <tr>
                       <td>Confirm E-mail</td>
                       <td>: <input type="text" name="reemail" id="reemail" autocomplete="off" placeholder="Re-enter Email" onChange="return checkremail()" class="signup" required></td>
                   </tr>
                   <tr>
                       <td>Password</td>
                       <td>: <input type="password" name="password" placeholder="New Password" class="textCtrl OptOut" id="ctrl_password" autocomplete="off" onkeyup="pwdStrength(this.value)" required></td>
					   <td><div id="pwdDescription" class="explain" class="desc" style="color: red"></div></td>
                   </tr>
                   <tr>
                       <td>Contact</td>
                       <td>: <input type="text" autocomplete="off" name="contact" id="contact" placeholder="Contact No." class="signup" maxlength="10" onkeypress="return mobile(event)" onChange="return Validate_contact()" required></td>
                   </tr>
                   <tr>
                       <td>Date Of Birth</td>
                       <td>: <input type="date" name="dob" id="field1" placeholder="Date Of Birth" required/></td>
                   </tr>
                   <tr>
                       <td>Location</td>
                       <td>: <input type="text" id="location" placeholder="Your Location" name="location" required/><div id="map_canvas" style="visibility:hidden" style="width:500px;height:350px;"/></td>
                   </tr>
				 			   
                </table>
						<input type="checkbox" class="check"> <b>I, hereby declare that i have read and understood the <a href="terms.php" id="terms">TERMS AND CONDITIONS</a> of this site.</b> </br>
                       <input class="reg"  type="submit" value="Register" name="submit">
                   
              
            </form>
            
        </div>';



    include_once 'common.php';
    
    if(isset($_POST['gender'])){
        $gen=htmlentities($_POST['gender']);
        $fname=htmlentities($_POST['fname']);
        $uname=  htmlentities($_POST['username']);
        $email=  htmlentities($_POST['email']);
        $pass=  md5(htmlentities($_POST['password']));
        $con=  htmlentities($_POST['contact']);
        $dob=  htmlentities($_POST['dob']);
        $loc=  htmlentities($_POST['location']);
        $querysno = "SELECT max(id) FROM users";
        $result=mysql_query($querysno,connect());
        $val=mysql_fetch_array($result);
        $sno= $val['max(id)'];
        $serial = $sno+1;
        $querymail = "SELECT * FROM users WHERE email='$email' OR username='$uname'";
        $resultmail=mysql_query($querymail,connect());
        $row1=  mysql_num_rows($resultmail);
       if($row1==0)
	   {
			$query=mysql_query("insert into users values($serial,'$gen','$fname','$uname','$email','$pass','$con','$dob','$loc','',now(),now(),now())",connect());
			if($query)
			{
				if (!file_exists("users/$uname"))
				{
				mkdir("users/$uname");
				}
				$out.= '<div class="feed">Successfully Registered</div>';
			}   
			else $out.= '<div class="feed">Network Problem!! Please Try Again </div>';
		}
		else $out.= '<div class="feed">Username (OR) E-mail Already Registered</div>';
    }
	
	echo $out;
?>
    </body>
</html>