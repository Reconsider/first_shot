<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml"> 

<?php
    session_start();
    /**/
    $uname=$_SESSION['uname'];
    $type=$_SESSION['type'];
    $name=$_SESSION['name'];
    $profile_pic_btn = '<a href="#" onclick="return false;" onmousedown="toggleElement(\'avatar_form\')">Toggle Avatar Form</a>';
	$avatar_form  = '<form id="avatar_form" enctype="multipart/form-data" method="post" action="photo_system.php">';
	$avatar_form .=   '<h4>Change your avatar</h4>';
	$avatar_form .=   '<input type="file" name="avatar" required>';
	$avatar_form .=   '<p><input type="submit" value="Upload"></p>';
	$avatar_form .= '</form>';
        
 ?>

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <script src="scripts/jQuery.js"></script>
        <script src="scripts/ajax.js"></script>
        	<link rel="stylesheet" href="style/members.css" type="text/css" media="screen" charset="utf-8"/>
	
<script type="text/javascript">
                    $(document).ready(function(){
					
						$('a.tab').click(function () {
							cont(this);
							return false;
							});
						$('a.tab').focus(function () {
							cont(this);
							return false;
							});
						});
						
						function cont(item)
						{	
							
							$('.active').removeClass('active');
							$(item).addClass('active');
							$('.content').slideUp();
							var content_show = $(item).attr('title');
							$('#'+content_show).slideDown();
						}
						
						function _(x)
						{
							return document.getElementById(x);
						}
						function toggleElement(x)
						{
							var x = _(x);
							if(x.style.display == 'block')
							{
								x.style.display = 'none';
							}
							else
							{
								x.style.display = 'block';
							}
						}
        </script>
</head>


<body>
<div id="wrapper">

<div id="head1">
<div id="logo"><a href="#"><img src="img/logo.png"/></a></div>
<div id="banner">
<div id="search">Search <div><input type="text" placeholder="SEARCH" /></div> </div>
<div id="title">"The Leap Of Faith" </div>
<div id="social">
<a href="https://www.facebook.com/helpinghand07"><img src="img/fb.gif"/></a><a href="http://www.twitter.org"><img src="img/twit.gif"/></a><a href="http://plus.google.com"><img src="img/gplus.gif"/></a>
</br>
<a href="#"><img src="img/share.gif"/></a>
</div>
<div class = "greet">
<?php
echo 'Welcome '.$_SESSION['name'].',';
echo " &nbsp &nbsp <a href='logout.php'>Log Out</a>";
?>
</div>
</div>
</div>


<div id="container">
   

    <div id="tabbed_box_1" class="tabbed_box">
        <div class="tabbed_area">
			<?php $type=$_SESSION['type'];
			if($type=="mentors")
			{
			?>
				<ul class="tabs">
					<li><a href="#" title="content_1" class="tab active">Profile Details</a></li>
					<li><a href="#" title="content_2" class="tab"><?php
					include 'common.php'; $count=mysql_query("select * from messages WHERE receiver='$uname' and status='1'",connect());
					$row=mysql_num_rows($count);
					echo "Messages($row)";
					?></a></li>
				</ul>
				<div id="content_1" class="content">
					<p>
						<?php echo $uname;?>
					</p>
						<div id="profile_pic_box"><?php
							$getava=mysql_query("select * from mentors WHERE username='$uname'",connect());
							while($infoava = mysql_fetch_array($getava))
							{
								$avatar=$infoava['avatar'];
							}
        
							if($avatar == NULL)
							{
								$profile_pic = '<img src="img/images/avatardefault.jpg">';
							}
							else {  $profile_pic = '<img src="mentors/'.$uname.'/'.$avatar.'" alt="'.$uname.'">';}
							echo $profile_pic_btn; ?><?php echo $avatar_form; ?><?php echo $profile_pic; ?>
						</div>
				</div>
	
				<div id="content_2" class="content">
					<div id="heading">
						<p>Your Messages<p>
					</div>
					<div id="messages">
						<ul>
							<?php //include 'common.php';
								$type=$_SESSION['type'];
								$query=mysql_query("SELECT * from messages  WHERE receiver='$uname' ORDER BY date DESC;",connect());
								while($info2 = mysql_fetch_array($query))
								{
									$serial=$info2['serial'];
									$from=$info2['sender'];
									$msg=$info2['message'];
									$date=$info2['date'];
									$status=$info2['status'];
									if($status==1)
									{
										echo "<li><div style='border-radius:10px;background-color:whitesmoke;'>
										From : ".$from." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date & Time : ".$date." <br/>
										Message :&nbsp;&nbsp; ".$msg."
										<div id='replymsg''><form action='send.php' method='POST'><input type='hidden' id='serial' value='$serial' name='serial'><input type='hidden' id='sender' value='$uname' name='sender'>
										<input type='hidden' id='serial' value='$type' name='type'>
										<input type='hidden' id='receiver' name='receiver' value='$from'><br/>
										<textarea name='replymsg' id='replymsg' rows='3' cols='85'></textarea><br/>
										<input type='submit' value='Send' name='send'>&nbsp;&nbsp;<a href='ignore.php?sno=$serial&&uname=$uname&&type=$type' style='width:30px;height:20px;padding:5px;text-decoration:none;background-color:grey;color:black;border-radius:6px;'>Ignore</a></form></div><hr>
										</div></li>";
									}
									else
									{
										echo "<li><div style='border-radius:10px;background-color:whitesmoke;'>
										From : ".$from." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date & Time : ".$date." <br/>
										Message :&nbsp;&nbsp; ".$msg."
											   
										<br/>
											   
										<br/>
										</div></li>";
									}
	//                              echo "<li><div style='border-radius:10px;background-color:whitwsmoke;'>
	//                               From : ".$from." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date & Time : ".$date." <br/>
	//                               Message :&nbsp;&nbsp; ".$msg."
	//                              </div><hr>
	//                             </div></li>";
                         // }
								}
							?>
						</ul>
					</div>
				</div>
		<?php 
			} 
			else if($type=="users")
			{
		?>
				<ul class="tabs">
					<li><a href="#" title="content_1" class="tab active">Profile Details</a></li>
					<li><a href="#" title="content_2" class="tab">
					<?php
					include 'common.php'; $count=mysql_query("select * from messages WHERE receiver='$uname' and status='1'",connect());
					$row=mysql_num_rows($count);echo "Messages($row)";
					?></a></li>
					<li><a href="#" title="content_3" class="tab">Mentors</a></li>
				</ul>
				<div id="content_1" class="content">
					<p><?php echo $uname;?></p>
					<div id="profile_pic_box"><?php
						$getava=mysql_query("select * from users WHERE username='$uname'",connect());
						while($infoava = mysql_fetch_array($getava))
						{
							$avatar=$infoava['avatar'];}
        
							if($avatar == NULL)
							{
								$profile_pic = '<img src="img/images/avatardefault.jpg">';
							}
							else 
							{  
								$profile_pic = '<img src="users/'.$uname.'/'.$avatar.'" alt="'.$uname.'">';
							}
							echo $profile_pic_btn; ?><?php echo $avatar_form; ?><?php echo $profile_pic; ?>
					</div>
				</div>
				<div id="content_2" class="content">
					<div id="heading">
						<p>Your Messages<p>
					</div>
					<div id="messages">
						<ul>
							<?php //include 'common.php';
                 
								 $type=$_SESSION['type'];
								 $query=mysql_query("SELECT * from messages  WHERE receiver='$uname' ORDER BY date DESC;",connect());
									while($info2 = mysql_fetch_array($query))
									{
										$serial=$info2['serial'];
										$from=$info2['sender'];
										$msg=$info2['message'];
										$date=$info2['date'];
										$status=$info2['status'];
										if($status==1)
										{
										   echo "<li><div style='border-radius:10px;background-color:whitesmoke;'>
										   From : ".$from." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date & Time : ".$date." <br/>
										   Message :&nbsp;&nbsp; ".$msg."
										   <div id='replymsg''><form action='send.php' method='POST'><input type='hidden' id='serial' value='$serial' name='serial'><input type='hidden' id='sender' value='$uname' name='sender'>
										   <input type='hidden' id='serial' value='$type' name='type'>
										   <input type='hidden' id='receiver' name='receiver' value='$from'><br/>
										   <textarea name='replymsg' id='replymsg' rows='3' cols='85'></textarea><br/>
										   <input type='submit' value='Send' name='send'>&nbsp;&nbsp;<a href='ignore.php?sno=$serial&&uname=$uname&&type=$type' style='width:30px;height:20px;padding:5px;text-decoration:none;background-color:grey;color:black;border-radius:6px;'>Ignore</a></form></div><hr>
										 </div></li>";
										}
										else
										{
										  echo "<li><div style='border-radius:10px;background-color:whitesmoke;'>
										   From : ".$from." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date & Time : ".$date." <br/>
										   Message :&nbsp;&nbsp; ".$msg."
										   
										  <br/>
										   
										   <hr>
										 </div></li>";
										}
//                              echo "<li><div style='border-radius:10px;background-color:whitwsmoke;'>
//                               From : ".$from." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date & Time : ".$date." <br/>
//                               Message :&nbsp;&nbsp; ".$msg."
//                              </div><hr>
//                             </div></li>";
                         // }
									}
                      ?>
						</ul>
					</div>
				</div>
				<div id="content_3" class="content">
					<div class="mentor">
					<?php 
						$querymen=mysql_query("select * from mentors",connect());
						while($infomen = mysql_fetch_array($querymen))
						{
                            $name=$infomen['fname'];
							$age=$infomen['age'];
							$exp=$infomen['exp'];
							$aoe=$infomen['aoe'];
							$mname=$infomen['username'];
							if($infomen['avatar'])
							{	$img=$infomen['avatar'];
								$img='mentors/'.$mname.'/'.$img;}
							else
								$img ='img/default.png';
							echo '<a href="mentor.php?mname='.$mname.'&&uname='.$uname.'&&type='.$type.'"><p>Name : '.$name.'<br/>Age :'. $age.'<br/> Exp. :'.$exp.'<br/>'.$aoe.
							'</p><img src='.$img.' /></a>';
                        }
			}
                   ?>
				   </div>
				</div>
        
		</div><!--END Tabbed_area-->
    </div><!--END Tabbed_box_1-->
  </div><!--COntainer-->

  
<div id="footer">
<ul>
<li><a href="terms_policy.php">Privacy Policy</a></li>
<li><a href="terms_policy.php">Terms and Conditions</a></li>
<li><a href="team.php">Meet Our TEAM</a></li>
</ul>
<p>&copy2014 All Rights Reserved.  Re-consider is a group under "Prayukti Solutions Private Ltd"  incorporated under the Companies act of 1956. Registrar of Companies Andhra Pradesh Hyderabad</p>
</div>

  </div><!--Wrapper-->
</body>
</html>
