<script src="<?php echo SITE_URL;?>/js/jquery.tools.min.js"></script>


<style>
.bubble {
	background-color: #FFAB00;
	border: 2px solid #333;
	border-radius: 5px;
	color: #333;
	display: inline-block;
	font: 16px/24px sans-serif;
	padding: 12px 24px;
	position: relative;
}

.bubble:after,.bubble:before {
	border-left: 20px solid transparent;
	border-right: 20px solid transparent;
	border-top: 20px solid #FFAB00;
	bottom: -20px;
	content: '';
	left: 50%;
	margin-left: -20px;
	position: absolute;
}

/* Styling for second triangle (border) */
.bubble:before {
	border-left: 23px solid transparent;
	border-right: 23px solid transparent;
	border-top: 23px solid;
	border-top-color: inherit;
	/* Can't be included in the shorthand to work */
	bottom: -23px;
	margin-left: -23px;
}

#user {
	height: 600px;
	width: 600px;
}

.rotateimage0 {
	-webkit-transform: rotate(-90deg);
	-moz-transform: rotate(-45deg);
	filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3 );
}

.rotateimage1 {
	-webkit-transform: rotate(-90deg);
	-moz-transform: rotate(-90deg);
	filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3 );
}

.rotateimage2 {
	-webkit-transform: rotate(-90deg);
	-moz-transform: rotate(-100deg);
	filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3 );
}

.rotateimage3 {
	-webkit-transform: rotate(-90deg);
	-moz-transform: rotate(-30deg);
	filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3 );
}

.scoreimage {
	background: url(../images/viewslip.png);
	background-size: 80px 60px;
	background-repeat: no-repeat;
}

body
{
	background-image:url(<?php echo SITE_URL .'/images/backgroundimage.jpg' ?>);
	background-repeat:no-repeat;
	background-size:1376px 680px;
}
#logged
{
	margin-top:120px; 
	margin-left:900px;
}
.prestyle
{
	background-image:url(<?php echo SITE_URL .'/images/background.png' ?>);
	background-repeat:no-repeat;
	background-size:668px 475px;
	border: 1px solid red;
	margin-left:345px;
	margin-top:-20px;
	width:670px;
	height:475px;
}
</style>

<body>
<div id='logged'>
<a href="../controller/controller.php?method=logout"  ><img src=<?php echo SITE_URL . '/images/logout.png' ?> height='80' width='80'/></a>
</div>
<div id='score'>
	<img src='http://www.rvcs.com/images/viewslip.png' width=150 height=200 />
</div>
<pre class="prestyle">
<div id="output" style='border : 1px solid green; margin-top:60px;margin-left:50px; width:550px;font-size:18px;'></div>
<div id="output1" style="border: 1px solid green;margin-top:200px;margin-left:50px;width:550px;height:115px;">
<center>
<a href="javascript:void(0)" onclick="letsplay()"><img src="../images/start.png" height='150' width='150'/></a>
</center>
</div>
<?php print_r($_SESSION);?>
<div id="output2"></div>
</pre>
</body>
<script>
var count =1;
var myTimer;      	
var myTimer1;      	
var images = ['rolledpaper1.png', 'rolledpaper2.png', 'rolledpaper3.png', 'rolledpaper4.png'];
var randnums = [0,1,2,3];
var message3 = "Mera Mantri kaun?";
var message2 = "Main Sarkaar!";
var user1 ="";
var user2="";
var user3="";
var user4="";
var username ="";
$(document).ready(function()
{

	

	$("#output1").hide();
	$("#commentbox").hide();
	$("#score").hide();
	function loggedinCount()
	{
		username = <?php echo "'".$_SESSION['username']."'"; ?>;
		<?php if(isset($_SESSION['user1']) && isset($_SESSION['user2']) && isset($_SESSION['user3']) && isset($_SESSION['user4'])){ ?>
		user1=<?php echo "'".$_SESSION['user1']."'"; ?>;
		user2=<?php echo "'".$_SESSION['user2']."'"; ?>;
		user3=<?php echo "'".$_SESSION['user3']."'"; ?>;
		user4=<?php echo "'".$_SESSION['user4']."'"; ?>;
		<?php }?>
		$.ajax
		({
			type: "POST",
	        	url: '../controller/controller.php?method=loggedinCount',
         		success: function(data)
         		{
         			
             		
             		if($.trim(data) != 4)
             		{
             			$("#output").show();
             			$("#output1").hide();		
				$("#output").html("Number of users Logged In:"+($.trim(data)));
				$("#output").append("<br/>Waiting for:"+(4-$.trim(data))+" more user to start the Game");
         			}
             		else
             		{
             			
             			$("#output").hide();
             			clearInterval(myTimer);
             			$("#output1").show();		
             		}
         		}
		});
		
	}
	loggedinCount();
	myTimer = setInterval(loggedinCount, 5000);
	
});
function fetchplayinguser()
{
	var a = 0;
	$.ajax
	({
		type: "POST",
        	url: '../controller/controller.php?method=fetchPlayingUser',
     		success: function(data)
     		{
     			$("#output2").html($.trim(data));
     			$("#u10").hide();
				$("#u21").hide();
				$("#u32").hide();
				$("#u43").hide();
				
         		if(($.trim(data)[($.trim(data).length) -6]) == 4)
         		{		
     				a =1;
					clearInterval(myTimer1);
         		}
			
     		},
		complete:function()
		{	
			
			if(a == 1)
     		{
				var a1 = randnums;
				$.ajax
				({
						type: "POST",
			        	url: '../controller/controller.php?method=turnRandom&r1='+a1,
			    });
				chanceshuffle(a1);
     		}
			
		}
	});
}

function fetchturnRandom()
{
	$.ajax
	({
			type: "POST",
        	url: '../controller/controller.php?method=fetchturnRandom',
        	success: function(data)
     		{
        		chanceshuffle($.trim(data));
     		}
    });
}

function insertslipRandom(a1)
{
	$.ajax
	({
			type: "POST",
        	url: '../controller/controller.php?method=insertslipRandom&r2='+a1,
    });
}

function fetchslipRandom()
{
	$.ajax
	({
			type: "POST",
        	url: '../controller/controller.php?method=fetchslipRandom',
        	success: function(data)
     		{
        		fetchshufle($.trim(data));
     		}
    });
}
function chanceshuffle(a1)
{
	
	var className = $('#u'+(a1[0]+1)).attr('class');
	
	if ($('#u'+(a1[0]+1)+a1[0]).is(":hidden"))
	{
		$('#u'+(a1[0]+1)+a1[0]).show();
	}
	if($('#u'+(a1[0]+1)+a1[0]).is(":visible"))
	{
		if(className == username)
		{
			$("#slips").append("<center><input type='button' onclick='shufle()' value='shuffle' /></center>");
		}
	}
}
function letsplay()
{
	
	$("#output1").hide();
	$.ajax
		({
			type: "POST",
	        	url: '../controller/controller.php?method=gameSet',
         		success: function(data)
         		{
             		
					$("pre").removeClass('prestyle');
             				myTimer1 = setInterval(fetchplayinguser, 2000);
         		}
			
		});
	
}

function popmessage(id)
{
	var mess="";
	if(id == 3)
	mess = message3;
	if(id == 2)
	mess = message2;
	if(id == 1)
	mess = message1;
	if(id == 0)
	mess = message0;
	$.ajax
		({
			type: "POST",
	        	url: '../controller/controller.php?method=insertMessage&message='+mess,
         		success: function(data)
         		{
				if($.trim(data) == "1")
				{
             				
					myTimer = setInterval(getmessage, 5000);
				}
         		}
		});
	
}

function getmessage()
{
	
	var k =0;
	$.ajax
		({
			type: "POST",
	        	url: '../controller/controller.php?method=getMessage',
         		success: function(data)
         		{
				var resp=jQuery.parseJSON($.trim(data));
				var name = " ";
				$.each(resp, function(key, val) 
				{
					

					if(key % 2 == 0)
					{
						name = val;
					}
					else
					{
						$("#"+name).html("<span class='bubble'>"+ val + "</span>");
					}
				});
				
         		}
		});
	
}
function shufle()
{
	
	var a="";
	
	$('#slips').html("");
	a+= "<center>";
	a+="<table>";
	
	var index = shuffle(randnums);
	insertslipRandom(index);
	for(var i=0;i<4;i++)
	{
		 if(i % 2 == 0)
		   {
			   
			 a+=  '<tr>';
		   }
		if(index[i] != "-1")
		{
	    a+='<td class ="rotateimage'+index[i]+'"> ';
	    a+='<a id="'+index[i]+'" onclick=choose("'+index[i]+'+'+index+'") href="javascript:void(0)">';
		a+=index[i];
	     a+='<img src="<?php echo SITE_URL."/images/" ?>' + images[index[i]] + '" height=50 width=50/>';
		a+='</a>';
	     a+='</td>';
}
	     if(i % 2 != 0)
		   {
	    	 
			  a+='</tr>';
		   }
	}
	   a+='</table>';
	
	   
		a+="</center>";
		$('#slips').html(a);
		myTimer2 = setInterval(fetchslipRandom, 5000);

	   

}

function fetchshufle(id)
{
	var a="";
	
	$('#slips').html("");
	a+= "<center>";
	a+="<table>";
	
	var index = id;
	
	for(var i=0;i<4;i++)
	{
		 if(i % 2 == 0)
		   {
			   
			 a+=  '<tr>';
		   }
		
		 if(index[i] != "-1")
		{
		
	    		a+='<td class ="rotateimage'+index[i]+'"> ';
	    		a+='<a id="'+index[i]+'" onclick=choose("'+index[i]+'","'+id+'") href="javascript:void(0)">';
		a+=index[i];
	     a+='<img src="<?php echo SITE_URL."/images/" ?>' + images[index[i]] + '" height=50 width=50/>';
		a+='</a>';

	     a+='</td>';
		}
	     if(i % 2 != 0)
		   {
	    	 
			  a+='</tr>';
		   }
	}
	   a+='</table>';
	
	   
		a+="</center>";
		$('#slips').html(a);
		chanceshuffle(id);

	   

}

function shuffle(o){ 
    for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}


function choose(id , rand)
{
	if(count == 1)
	{
		$("#"+id).hide();
		var a1 = rand.replace(""+id, "-1");
		var a="";
		a+='<a href="javascript:void(0)" onclick=score("'+id+'") >';
		a+='<img src="<?php echo SITE_URL."/images/" ?>' + images[id] + '" rel="#mies1" height=50 width=50 />';
		a+='</a>';
		$("."+username).append(a);
		insertslipRandom(a1);
		myTimer = setInterval(getmessage, 5000);
		count --;
	}
	
}
function score(id)
{
	$("#score").show();
	$("#shufle").hide();
	$("#score").addClass("scoreimage");
	if(id == 0)
	{
		$("#score").html("<table><tr><td></td><td></td><td style='height:60px; width:40px;'>0</td></tr></table>");

	}
	else if(id == 3)
	{
		

		$("#score").html("<table><tr><td></td><td></td><td style='height:60px; width:40px;'>1000</td></tr></table>");
		$("#popmessage").html("<input type='button' value='Find Mantri' onclick=popmessage('" + id + "') />");
		
		
		
	}
	else if(id == 2)
	{
		$("#score").html("<table><tr><td></td><td></td><td style='height:60px; width:40px;'>800</td></tr></table>");
		$("#popmessage").html("<input type='button' value='Respond to king' onclick=popmessage('" + id + "') />");
	}
	else
	{
		$("#score").html("<table><tr><td></td><td></td><td style='height:60px; width:40px;'>500</td></tr></table>");


	}
	$("#score").fadeIn();
	$("#score").fadeOut(5000);
}
</script>


