<html>
    <head>
		<link rel="stylesheet" href="style/message.css" type="text/css" media="screen" charset="utf-8"/>
	</head>
    <body>
		<?php $mname=$_GET['mname'];$uname=$_GET['uname'];$type=$_GET['type'];?>
		<div id="head1">
		<div id="logo"><a href="index.php"><img src="img/logo.png"/></a></div>
		<div id="banner">
		<div id="search">Search <div><input type="text" placeholder="SEARCH" /></div> </div>
		<div id="title"><!--<img src="img/title.png"/>-->"The Leap Of Faith" </div>
		<div id="social">
		<a href="http://www.facebook.com"><img src="img/fb.gif"/></a><a href="http://www.twitter.org"><img src="img/twit.gif"/></a><a href="http://plus.google.com"><img src="img/gplus.gif"/></a>
		</br>
		<a href="#"><img src="img/share.gif"/></a>
		</div>
		<div class = "greet">
		<?php
		echo 'Welcome '.$uname.',';
		echo " &nbsp &nbsp <a href='logout.php'>Log Out</a>";
		?>
		</div>
		</div>
		</div>
		<div class="cont">
		<div class="back" onclick="history.go(-1);"><a href="members.php" >Back</a></div>
        
          Hey, you are visiting the profile of <b><?php echo $mname;?></b> </br>
		  Tell him/her about your history, the time(no. of days, months or years) of trouble and describe the issue clearly</br></br>
          Send Him a Message
          <form action="inisend.php" method="POST">
              <input type='hidden' value='<?php echo $uname;?>' name='sender'>
              <input type='hidden' value='<?php echo $type;?>' name='type'>
              <input type='hidden'  value='<?php echo $mname;?>' name='receiver'><br/>
             <textarea name='replymsg' id='replymsg' rows='3' cols='85'></textarea><br/></br>
             <input type='submit' value='Send' name='send'>
          </form>
		 </div>
		<div id="footer">
		<ul>
		<li><a href="privacy_policy.php">Privacy Policy</a></li>
		<li><a href="terms.php">Terms and Conditions</a></li>
		<li><a href="team.php">Meet Our TEAM</a></li>
		</ul>
		<p>&copy2014 All Rights Reserved.  Re-consider is a group under "Prayukti Solutions Private Ltd"  incorporated under the Companies act of 1956. Registrar of Companies Andhra Pradesh Hyderabad</p>
		</div>
    </body>
</html>