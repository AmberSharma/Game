<script src="<?php echo SITE_URL;?>/js/jquery.tools.min.js"></script>

<script>




            		 
  var myTimer;      	
  var images = ['rolledpaper1.png', 'rolledpaper2.png', 'rolledpaper3.png', 'rolledpaper4.png'];
$(document).ready(function()
{
	
	
	$("#output1").hide();
	function loggedinCount()
	{
		
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
             			//setInterval(loggedinCount, 0);
             			clearInterval(myTimer);
             			$("#output1").show();		
             		}
         		}
		});
		
	}
	loggedinCount();
	myTimer = setInterval(loggedinCount, 5000);
	
});
function letsplay()
{
	$("#output1").hide();
	
	$("#output2").html("<table id='user'><tr><td></td><td id='u1'><?php echo ucfirst($_SESSION["user1"]);?></td><td></td></tr><tr><td id='u2'><?php echo ucfirst($_SESSION["user2"]);?></td><td id='slips'><table><tr><td class ='rotateimage0'><img  src='<?php echo SITE_URL."/images/rolledpaper1.png" ?>' height=50 width=50/> </td><td class ='rotateimage1'><img src='<?php echo SITE_URL."/images/rolledpaper2.png" ?>' height=50 width=50/> </td></tr><tr><td class ='rotateimage2'><img src='<?php echo SITE_URL."/images/rolledpaper3.png" ?>' height=50 width=50/> </td><td class ='rotateimage3'><img src='<?php echo SITE_URL."/images/rolledpaper4.png" ?>' height=50 width=50/> </td></tr></table></td><td id='u4'><?php echo ucfirst($_SESSION["user4"]);?></td></tr><tr><td></td><td id='u3'><?php echo ucfirst($_SESSION["user3"]);?></td><td></td></tr></table>");

	$("#slips").append("<input type='button' onclick='shufle()' value='shuffle' />");
}
function shufle()
{
	
	var a="";
	
	$('#slips').html("");
	a+="<table>";
	var randnums = [0,1,2,3];
	var index = shuffle(randnums);
	   
	for(var i=0;i<4;i++)
	{
		 if(i % 2 == 0)
		   {
			   
			 a+=  '<tr>';
		   }
	    a+='<td class ="rotateimage'+index[i]+'"> ';
	    a+='<a id="'+index[i]+'" onclick=choose("'+index[i]+'") href="javascript:void(0)">';
	     a+='<img src="<?php echo SITE_URL."/images/" ?>' + images[index[i]] + '" height=50 width=50/>';
		a+='</a>';
	     a+='</td>';
	     if(i % 2 != 0)
		   {
	    	 
			  a+='</tr>';
		   }
	}
	   a+='</table>';
	   a+="<input type='button' onclick='shufle()' value='shuffle' />";
	   $('#slips').html(a);
}

function shuffle(o){ //v1.0
    for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}
function choose(id)
{
	//alert(id);
	$("#"+id).hide();
	var a="";
	a+='<img src="<?php echo SITE_URL."/images/" ?>' + images[id] + '" height=50 width=50/>';
	$("#u1").append(a);
	
}


</script>
<style>
#user
{
	height:600px;
	width:600px;
}

.rotateimage0 {
 -webkit-transform: rotate(-90deg);
 -moz-transform: rotate(-45deg);
 filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
}
.rotateimage1 {
 -webkit-transform: rotate(-90deg);
 -moz-transform: rotate(-90deg);
 filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
}
.rotateimage2 {
 -webkit-transform: rotate(-90deg);
 -moz-transform: rotate(-100deg);
 filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
}
.rotateimage3 {
 -webkit-transform: rotate(-90deg);
 -moz-transform: rotate(-30deg);
 filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
}
</style>

<a href="../controller/controller.php?method=logout" >Logout</a>

<div id="output"></div>
<div id="output1">
<pre>The chits are thrown and all 4 people have to pick one chit each.
Lets say the 4 people are A,B,C,D.
All 4 pick up one chit each. They have to keep it secret that which chit they picked.
Assume:
A picks Raja
B picks Mantri
C picks Sipahi
D picks chor
A says mera mantra kaun? 
B says Mein sarkar 
A says chor sipahi ka pata lagao 
At this point B has to guess who between C and D is chor and who is sipahi by doing some sort of face reading but mainly its all guess and luck work.
Lets say B guesses it wrong .In this case the thief gets 500 points and assistant (mantra) will get 0 points.

</pre>
<input type="button" value="Ok Lets Play!!!" onclick="letsplay()"/>
</div>
<?php print_r($_SESSION);?>



<div id="output2"></div>


