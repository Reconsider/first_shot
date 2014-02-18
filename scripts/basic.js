var x;
$(document).ready(function(){
onload();
$('#nav li:nth-child(1)').css('padding-left','50px');
$('#nav li a').click(function(){var val=$(this); menu(val); return false;});
$('#reading .small_but').click(function() {var val=$(this); reading(val);});
$('.back').click(function() {var val=$(this); back(val);});
$('#login a').click(function (){var val=$(this);log(val); return false;});
$('#sharing a').click(function (){var val=$(this);log(val); return false;});
slideshow();
$('#log :submit').click(function(){log_form(); return false;});
$('#about p').mouseover(function(){$(this).css('background','rgb(0,250,150)');});
$('#about p').mouseout(function(){$(this).css('background','#FFF');});
});




function menu(val)
{
 var x=$(val).attr('href'); 
 $(window).scrollTo(x,1000);
 $('#nav li').stop().animate({'padding-left':'0'},200);
 var y= $(val).parent('li');
 $(y).stop().animate({'padding-left':'50px'},200);
}

function reading(val)
{
var par=$(val).parent();
$('#reading .seg').fadeOut('slow');
$('.sub_seg').fadeIn('slow');
}

function back(val)
{
var par=$(val).parent();
var type=$(par).attr('class')
if (type=='sub_seg')
	{
	$('.sub_seg').fadeOut('slow');
	$('#reading .seg').fadeIn('slow');
	}
else if(type=='pop_box')
	{
	if($('.feed').length>0)
	{$('.feed').remove();}
	if($('#termbox').length>0)
	{$('#termbox').remove();}
	$('.pop_box input:not(.submit, .reg)').val("");
	$('.pop_box .desc').text("");
	$('.pop_box').fadeOut('slow');
	$('#log').hide();
	$('#register').hide();
	}
}

function log(val)
{

var link=$(val).attr('href');
$('.pop_box').fadeIn();

if (link=='login.php')
{
$('#log .feed').remove();
$('#log').fadeIn();
}
else if (link=='register.php')
{$('#register').fadeIn();
}
}

/*
function chng()
{
var y= $(document).height();
var h=y/6;
var x=$(window).scrollTop();

if(x<(0.15*h))
{
$('#nav li').css('padding-left','0');
$('#nav li:nth-child(1)').css('padding-left','50px');
$('#nav').stop().animate({'left':'0'});
}
else
{

if(x<h)
{
$('#nav li').css('padding-left','0');
$('#nav li:nth-child(1)').css('padding-left','50px');
}
if(x>(0.6*h) && x<(1.6*h))
{
$('#nav li').css('padding-left','0');
$('#nav li:nth-child(2)').css('padding-left','50px');
}
else if(x>(1.6*h) && x<(2.6*h))
{
$('#nav li').css('padding-left','0');
$('#nav li:nth-child(3)').css('padding-left','50px');
}
else if(x>(2.6*h) && x<(3.6*h))
{
$('#nav li').css('padding-left','0');
$('#nav li:nth-child(4)').css('padding-left','50px');
}
else if(x>(3.6*h) && x<(4.6*h))
{
$('#nav li').css('padding-left','0');
$('#nav li:nth-child(5)').css('padding-left','50px');
}
else if(x>(4.6*h) && x<(4.9*h))
{
$('#nav li').css('padding-left','0');
$('#nav li:nth-child(6)').css('padding-left','50px');
}
}
}
/*
if(x>h)
{$('#cont').css('height',y);}
else if(x<h)
{var z=y/100*70;
$('#cont').css('height',z);}*/

/*
if(x>h && x<(2*h))
{$('#wrapper').css('backgroundColor','#1fb53b');}
else if(x>(2*h) && x<(3*h))
{$('#wrapper').css('backgroundColor','#5bbe13');}
else if(x>(3*h)&&x<(4*h))
{$('#wrapper').css('backgroundColor','#1fa945');}
else if(x>(4*h)&&x(5*h))
{$('#wrapper').css('backgroundColor','#70b165');}
else if(x>(5*h)&&x<(6*h))
{$('#wrapper').css('backgroundColor','#ee3e9a');}
else
{$('#wrapper').css('backgroundColor','#1fb59f');}
}*/

function onload()
{
/*$('.box').css('background','none');*/
$('#login a').click(function(){

var link=$(this).attr('href');

return false;
});
}

function slideshow()
{
$('#slide').unslider({
	speed: 500,               //  The speed to animate each slide (in milliseconds)
	delay: 8000,              //  The delay between slide animations (in milliseconds)
	complete: function() {},  //  A function that gets called after every slide animation
	keys: true,               //  Enable keyboard (left, right) arrow shortcuts
	dots: false,               //  Display dot navigation
	fluid: true              //  Support responsive design. May break non-responsive designs
});
}


