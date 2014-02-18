<html>
    <head>
        <title>Mentor Registration</title>
        <script type="text/javascript">
               function uname(e) {
                    var k;
                    document.all ? k = e.keyCode : k = e.which;
                    return ((k > 64 && k < 91) || (k > 96 && k < 123)||(k>47&&k<58)) ;
                }

function checkusername(){
    var u = document.getElementById("username").value;
	if(u != ""){
		document.getElementById("unamestatus").innerHTML = 'Cheking...';
		var ajax = ajaxObj("POST", "menchek.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            document.getElementById("unamestatus").innerHTML = ajax.responseText;
	        }
        }
        ajax.send("usernamecheck="+u);
	}
}
</script>
<script src="js/ajax.js"></script>
    </head>
    
    <body>
        <form action="menreg.php" method="POST">
               <table>
                   <tr>
                       <td>Gender</td><td>:</td>
                       <td><input type="radio" name="gender" id="gender" value="Mr.">Mr.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <input type="radio" name="gender" id="gender" value="Ms.">Ms.&nbsp;&nbsp;&nbsp;&nbsp;
                           <input type="radio" name="gender" id="gender" value="Mrs.">Mrs.&nbsp;&nbsp;&nbsp;&nbsp;
                       </td>
                   </tr>
                   <tr>
                       <td>Full Name</td><td>:</td>
                       <td><input type="text" name="fname" id="fname" placeholder="Full Name" class="names" required></td>
                   </tr>
                   <tr>
                       <td>E-mail</td><td>:</td>
                       <td><input type="text" name="email" id="email" autocomplete="off" placeholder="Your E-Mail" class="signup" onChange="return checkmail()" required><span id="emailcheck"></span></td>
                   </tr>
                   <tr>
                       <td>Username</td><td>:</td>
                       <td><input type="text" name="username" id="username" placeholder="Username" class="names" onblur="checkusername()" onkeypress="return uname(event)" maxlength="12" required>
                       <span id="unamestatus"></span><br/>
                <span style="font-size:12px;font-weight: lighter;">(only numbers and alphabets)</span></td>
                   </tr>
                   <tr>
                       <td>Password</td><td>:</td>
                       <td><input type="text" name="password" placeholder="New Password" class="textCtrl OptOut" id="ctrl_password" autocomplete="off" onkeyup="pwdStrength(this.value)" required><span id="pwdDescription" class="explain" style="color: red"></span></td>
                   </tr>
                   <tr>
                       <td>Age</td><td>:</td>
                       <td><input type="number" name="age" id="age" placeholder="Age" class="names" required></td>
                   </tr>
                   <tr>
                       <td>Experience</td><td>:</td>
                       <td><select name="exp" id="exp">
                               <option value="0-5">0-5 Years</option>
                               <option value="6-10">6-10 Years</option>
                               <option value="11-15">11-15 Years</option>
                               <option value="16-20">16-20 Years</option>
                           </select></td>
                   </tr>
                   <tr>
                       <td>Area of Expertise</td><td>:</td>
                       <td><input type="text" name="aoe" id="aoe" class="names" required></td>
                   </tr>
                   <tr>
                       <td>Description</td><td>:</td>
                       <td><textarea name="about" placeholder="About Mentor (Minimum 50 words)" rows="10" cols="50"></textarea></td>
                   </tr>
                   <tr>
                       <td><input type="submit" value="Register" name="submit"></td>
                   </tr>
               </table>
            </form>
    </body>
</html>

<?php
    include 'common.php';
    
    if(isset($_POST['submit'])){
        $gen=htmlentities($_POST['gender']);
        $fname=htmlentities($_POST['fname']);
        $uname=  htmlentities($_POST['username']);
        $email=  htmlentities($_POST['email']);
        $pass=  md5(htmlentities($_POST['password']));
        $age=  htmlentities($_POST['age']);
        $exp=  htmlentities($_POST['exp']);
        $aoe=  htmlentities($_POST['aoe']);
        $about=htmlentities($_POST['about']);
        $querysno = "SELECT max(id) FROM mentors";
        $result=mysql_query($querysno,connect());
        $val=mysql_fetch_array($result);
        $sno= $val['max(id)'];
        $serial = $sno+1;
        $querymail = "SELECT * FROM mentors WHERE email='$email' OR username='$uname'";
        $resultmail=mysql_query($querymail,connect());
        $row1=  mysql_num_rows($resultmail);
       if($row1==0){
        $query=mysql_query("insert into mentors values($serial,'$gen','$fname','$uname','$email','$pass','$age','$exp','$aoe','$about','',now(),now(),now())",connect());
        if($query){
            if (!file_exists("mentors/$uname")) {
			mkdir("mentors/$uname");
		}
            echo "<div>Successfully Registered :)</div>";
        }   
        else echo "<div>Network Problem!! Please Try Again :(</div>";
    }
    else echo "<div>Username (OR) E-mail Already Registered</div>";
    }
?>