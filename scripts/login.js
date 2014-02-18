$(document).ready(function() 
{
$('#log :submit').click(function(){log_form(); return false;});
$('.load').hide();
});


function log_form()
{
var xmlhttp;
$('.load').show();
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status ==200)
{
var str = xmlhttp.responseText;
var str1 = str.split(',,');
if (str1[2])
{
	if(str1[2].search('users')>0)
	{
	window.location.href= 'members.php?uname='+str1[1]+'&&type=users';
	}
	else if (str1[2].search('mentors')>0)
	{
	window.location.href= 'members.php?uname='+str1[1]+'&&type=mentors';
	}
	else if(str1[2].search('admin')>0)
	{
	window.location.href= 'admin.php?uname='+str1[1];
	}
}
else
{
$('.load').hide();
$('#log').html(str);}
}
}
xmlhttp.open("POST","login.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("email="+$('#log .email').val()+"& pass="+$('#log .password').val()+"& post="+$('#log .post').val());
}

/*"email="+$('#log .email').val()+"& pass="+$('#log .password').val()*/