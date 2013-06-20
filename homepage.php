<?php require_once "/var/www/Game/trunk/libraries/constant.php"; ?>
<script src="<?php echo SITE_URL;?>/js/jquery.tools.min.js"></script>
<html>
<head>

<style>
/* the overlayed element */
.simple_overlay {
 
    /* must be initially hidden */
    display:none;
 
    /* place overlay on top of other elements */
    z-index:10000;
 
    /* styling */
    background-color:#333;
 
    min-width:200px;
    min-height:200px;
    border:1px solid #666;
 
    /* CSS3 styling for latest browsers */
    -moz-box-shadow:0 0 90px 5px #000;
    -webkit-box-shadow: 0 0 90px #000;
}
 
/* close button positioned on upper right corner */
.simple_overlay .close {
    background-image:url(images/close.png);
    position:absolute;
    right:-15px;
    top:-15px;
    cursor:pointer;
    height:35px;
    width:35px;
}

.details {
  position:absolute;
  left:15px;
  top:5px;
  font-size:11px;
  color:#fff;
  width:150px;
  }
 
  .details pre {
  color:#FF5500;
  font-size:12px;
  }
a
{
text-decoration:none;
}
table
{
margin-top:270px;
margin-left:84px;
width:500px;
height:115px;
}
#container
{
	border:1px solid green;
	background-image:url(<?php echo SITE_URL .'/images/rvcsgame.jpg' ?>);
	background-repeat:no-repeat;
	background-size:668px 475px;
	background-color: transparent;
  	box-shadow: 40px 40px 100px 40px #000;
	margin-top:170px;
	margin-left:346px;
	height:475px;
	width:670px;
}
body
{
	background-image:url(<?php echo SITE_URL .'/images/backgroundimage.jpg' ?>);
	background-repeat:no-repeat;
	background-size:1376px 680px;
}
</style>
</head>
<body>
<div id="container">
<table cellspacing="0">
<tr>
<td>
<a href="index.php"><img src="images/startgame.jpg" height='50' width='500'/></a>
</td>

</tr>
<tr>
<td>
<a href="#" ><img src="images/gamerules.jpg" rel="#mies1" height='50' width='500'/></a>
</td>

</tr>
</table>
</div>
<div class="simple_overlay" id="mies1">
<img src="images/therules.jpg" width='400' height='500'/>
<div class="details">
<pre>
<br />
<br />
<br />
Step 1: The chits are thrown and all 4 people have
to pick one chit each.
Lets say the 4 people are A,B,C,D.
All 4 pick up one chit each. 
Step 2: They have to keep it secret that which chit
they picked.
Assume:
A picks Raja
B picks Mantri
C picks Sipahi
D picks chor
Step 3: A says mera mantra kaun? 
Step 4: B says Mein sarkar 
Step 5: A says chor sipahi ka pata lagao 
Step 6: At this point,
B has to guess who between C and D is chor and who
is sipahi by doing some sort of face reading but mainly
its all guess and luck work.
Step 7: Lets say B guesses it wrong.
Step 8: In this case the thief gets 500 points and 
assistant (mantri) will get 0 points.
</pre>
  </div>
</div>
</body>
</html>
<script>
  $("img[rel]").overlay();
</script>
