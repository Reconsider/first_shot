<html>
    <head>
        <link rel="stylesheet" href="style/login.css" type="text/css" media="screen" charset="utf-8"/>
		<script type="text/javascript" src="scripts/login.js"></script>
    </head>
    
    <body>
        <?php
        $out='<form action="login.php" method="POST">
            
                    E-mail:
                    <input type="email" name="email" class="email" autocomplete="off" required/>
                Password:
                    <input type="password" name="pass" class="password" required/>
            Designation:
			</br>
                    <select name="post" class="post">
                            <option value="users">User</option>
                            <option value="mentors">Mentor</option>
                            <option value="admin">Admin</option>
                        </select>
						</br>
               <input type="submit" class ="submit" value="Login" name="login"/>
              
        </form>
		<div class="load"><img src = "img/load.gif"/></div>';
 


  include_once 'common.php';
    if(isset($_POST['email']))
	{
        $email=htmlentities($_POST['email']);
        $post=$_POST['post'];
       if($post=="users"){
           $pass=md5($_POST['pass']);
        $query= mysql_query("SELECT * FROM users WHERE `email`='$email' and `password`='$pass'",connect());
        $row=mysql_num_rows($query);
        if($row==0) 
		{$out.='<div class="feed">Invalid E-mail (or) Password (OR) Designation.</div>';}
        else 
		{
            $namequery="SELECT * FROM users WHERE `email`='$email'";
            $data1 = mysql_query($namequery,connect());
             while($info1 = mysql_fetch_array($data1))
			 {
               $gen=$info1['gender'];
               $fname=$info1['fname'];
               $uname=$info1['username'];
               $name=$gen."  ".$fname;
               session_start();
               $_SESSION['name']=$name;
               $_SESSION['type']="users";
               $_SESSION['uname']=$uname;
               /*header('Location: members.php?uname='.$uname.'&&type=users');*/
			   $out="";
			   $out=',,'.$uname.',,/users';
             }
           }
 
        }
      if($post=="mentors")
	  {
          $pass=md5($_POST['pass']);
          $query= mysql_query("SELECT * FROM mentors WHERE `email`='$email' and `password`='$pass'",connect());
        $row=mysql_num_rows($query);
        if($row==0) 
		{$out.= '<div class="feed" >Invalid E-mail (or) Password (OR) Designation</div>';}
        else 
		{
            $namequery="SELECT * FROM mentors WHERE `email`='$email'";
            $data1 = mysql_query($namequery,connect());
             while($info1 = mysql_fetch_array($data1))
			 {
               $gen=$info1['gender'];
               $fname=$info1['fname'];
               $name=$gen."  ".$fname;
               $uname=$info1['username'];
               session_start();
               $_SESSION['name']=$name;
               $_SESSION['type']="mentors";
               $_SESSION['uname']=$uname;
               /*header('Location: members.php?uname='.$uname.'&&type=mentors');*/
			    $out="";
			   $out=',,'.$uname.',,/mentors';
             }
        }
      }
      if($post=="admin")
	  {
           $pass=$_POST['pass'];
        $query= mysql_query("SELECT * FROM admin WHERE `username`='$email' and `password`='$pass'",connect());
        $row=mysql_num_rows($query);
        if($row==0) 
		{$out .= '<div class="feed" >Invalid E-mail (or) Password (OR) Designation.</div>';}
        else
		{
            $namequery="SELECT * FROM admin WHERE `username`='$email'";
            $data1 = mysql_query($namequery,connect());
             while($info1 = mysql_fetch_array($data1))
			 {
               $uname=$info1['username'];
               session_start();
               $_SESSION['username']=$uname;
			   $out="";
			   $out="success";
			   /*header('Location: admin.php?uname='.$uname);*/
			    $out="";
			   $out=',,'.$uname.',,/admin';
             }
        }
 
       }
    }
	
	echo $out;
?>

   </body>
</html>