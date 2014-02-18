
$(document).ready(function()
{
	$('.reg').click(function()
	{
		reg();
		return false;
	});
	$('#terms').click(function()
	{
		terms();
		return false;
	});
	
});
				

function terms()
{
	if($('#termbox').length==0)
	{
		$('<div id="termbox"><img src="img/close.png" alt="close"/><div></div></div>').appendTo('#register');
		$('#termbox').hide();
	}
	$('#termbox').fadeIn();
	$('#termbox div').load('terms.inc');
	$('#termbox img').click(function()
	{
		$('#termbox').fadeOut('normal',function(){$('#termbox').remove();});
		
	});
	
}

$().ready(function() 
{
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = 
	{
		zoom: 8,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    $('#location').geo_autocomplete(new google.maps.Geocoder, 
	{
		mapkey: 'ABQIAAAAbnvDoAoYOSW2iqoXiGTpYBT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQNumU68AwGqjbSNF9YO8NokKst8w', 
        selectFirst: false,
		minChars: 3,
		cacheLength: 50,
		width: 300,
		scroll: true,
		scrollHeight: 330
	}).result(function(_event, _data) 	{
                            if (_data) map.fitBounds(_data.geometry.viewport);
										});

});
			
function reg()			//funciton is called when register button is clicked
{	
	var xmlhttp;
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			$('#register').html(xmlhttp.responseText);
		}
	}
	var notvalid=validate();
	if(notvalid==0)
	{
		xmlhttp.open("POST","register.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send( 'gender='+$('input[name=gender]').val()+'& fname='+$('input[name=fname]').val()+'& username='+$('input[name=username]').val()+'& email='+$('#email').val()+'& password='+$('input[name=password]').val()+'& contact='+$('input[name=contact]').val()+
			'&dob='+$('input[name=dob]').val()+'& location='+$('input[name=location]').val());
	}
	else
	{
		alert("Please fill valid data into the required fields");
	}
}

function validate()
{
	var notvalid=0;
	if ($('input[name=fname]').val()=="")
	{notvalid+=1;}
	if ($('input[name=username]').val()=="")
	{notvalid+=1;}
	if($('input[name=password]').val()=="")
	{notvalid+=1;}
	if($('input[name=contact]').val()=="")
	{notvalid+=1;}
	if($('input[name=dob]').val()=="")
	{notvalid+=1;}
	if($('input[name=location]').val()=="")
	{notvalid+=1;}
	if($('input[name=reemail]').val()=="")
	{notvalid+=1;}
	if(!$('.check').is(':checked'))
	{notvalid+=1;
	alert ("Please accept the TERMS AND CONDITIONS");}
	return notvalid;
}
     
function uname(e) 
{
	var k;
	document.all ? k = e.keyCode : k = e.which;
	return ((k > 64 && k < 91) || (k > 96 && k < 123)||(k>47&&k<58)) ;
}

function checkusername()
{
	var ajax= new XMLHttpRequest();
    var u = document.getElementById("username").value;
	if(u != "")
	{
		document.getElementById("unamestatus").innerHTML = 'Checking...';
		ajax.onreadystatechange = function() 
		{
	        if(ajax.readyState==4 && ajax.status==200) 
			{
	            document.getElementById("unamestatus").innerHTML = ajax.responseText;
	        }
        }
		ajax.open("POST", "unamechek.php",true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.send("usernamecheck="+u);
	}
}

function processData(f1,f2,f3,f4,f5,f6)
{
	var v1 = document.getElementById(f1).value;
	var v2 = document.getElementById(f2).value;
	var v3 = document.getElementById(f3).value;
	var v4 = document.getElementById(f4).value;
	var v5 = document.getElementById(f5).value;
	var v6 = document.getElementById(f6).value;
	alert(v1+"\n"+v2+"\n"+v3+"\n"+v4+"\n"+v5+"\n"+v6);
}
