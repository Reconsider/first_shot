

function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123)||k==8||k==32) ;
}

function checkmail(){
                         var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
                             var f=document.getElementById("email");
                             var e=document.getElementById("email").value;
                          var returnval=emailfilter.test(e);
                            if (returnval==false){
                            alert("Please enter a valid email address.")
                              f.value="";
                              f.focus();
                              e.select()      
                              }
                           else{
                               
                             var xmlhttp;
                     document.getElementById("emailcheck").style.visibility="visible";
                     if (window.XMLHttpRequest)
                     {
                         xmlhttp=new XMLHttpRequest();
                     }
                     else
                 {   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                     xmlhttp.onreadystatechange=function()
                     {
                         if (xmlhttp.readyState==4 && xmlhttp.status==200)
                         {
                             document.getElementById("emailcheck").innerHTML=xmlhttp.responseText;
                         }
                         else 
                         {
                              document.getElementById("emailcheck").innerHTML = '<img src="images/loading.gif"> Checking.....';
                         }
                     }
                     xmlhttp.open("GET","emailcheck.php?q="+e,true);
                     xmlhttp.send();
                             return returnval
                         }
             }
  
  
function checkremail(){
	var f=document.getElementById("reemail");
	var e=document.getElementById("reemail").value;
	var g=document.getElementById("email");
	var h=document.getElementById("email").value;
	if (e!=h)
	{
		alert("Email-Ids not matching.");
		f.value="";
		f.focus();
		e.select();      
	}
	return returnval;
}


function Validate_contact()
{
	var x=document.getElementById("contact");
	var PhoneNoExp = /^[0-9,+]+$/;
	if (!x.value == "") 
	{ 
		if(x.value.length!=10)
		{
			 alert("Enter ten digits only"); 
			 x.value="";
			 x.focus();
			 return false;
		}
   } 
}


function mobile(e) 
{
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k >= 48 && k <= 57)) ;
}

function pwdStrength(password)
{
	var desc = new Array();
	desc[0] = "<font color='red'>Very Weak</font>";
	desc[1] = "<font color='red'>Weak</font>";
	desc[2] = "<font color='orange'>Better</font>";
	desc[3] = "<font color='orange'>Medium</font>";
	desc[4] = "<font color='green'>Strong</font>";
	desc[5] = "<font color='green'>Strongest</font>";
	var score  = 0;
	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;
	//if password has both lower and uppercase characters give 1 point
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;
	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;
	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;
	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;
	document.getElementById("pwdDescription").innerHTML = desc[score];
	document.getElementById("pwdStrength").className = "strength" + score;
}
