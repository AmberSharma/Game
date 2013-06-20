<?php
echo "<body>";
echo "<table id='user'  class='tableback' style='margin-top:-150px; margin-left:380px;'>";
	echo "<tr>";
		echo "<td></td>";
		echo "<td class='back' style='padding-left: 20px;padding-top: 50px;'>";
			echo "<table >";
			echo "<tr>";
			
			echo "<td id='";
			if(isset($_SESSION['user1']))
			{
				echo $_SESSION['user1']; 
			}
			echo "'  colspan=2></td>";
			echo "</tr>";
			echo "<tr>";
			if(isset($_SESSION['user1']))
			{
				echo "<td id='u1' class=' ";
				echo $_SESSION['user1'];
				echo " '> </td>";
			}
			else
			{
				echo "<td id='u1'  >";
			}
			if(isset($_SESSION['user1']))
			{
				echo "<h2>".ucfirst($_SESSION['user1'])."</h2>";
			}
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td id='u10' ><img src='".SITE_URL."/images/greenarrowup.gif' height=50 width=50/></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td id='popmessage' ></td>";
			echo "</tr>";
			echo "</table>";
		echo "</td>";
		echo "<td ></td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td class='back' style='padding-left: 70px; padding-bottom:10px; padding-right:40px;'>";
		
		echo "<table>";
			echo "<tr>";
			echo "<td id='";
			if(isset($_SESSION['user2']))
			{
				echo $_SESSION['user2']; 
			}
			echo "'  colspan=2></td>";
			echo "</tr>";
			echo "<tr>";
			if(isset($_SESSION['user2']))
			{
				echo "<td id='u1' class='";
				echo $_SESSION['user2'];
				echo " '></td>";
			}
			else
			{
				echo "<td id='u1' >";
			}
			if(isset($_SESSION['user2']))
			{
				echo "<h2>".ucfirst($_SESSION['user2'])."</h2>";
			}
			echo "</td>";
			echo "<td id='u21' ><img src='".SITE_URL."/images/greenarrowleft.gif' height=50 width=50/></td>";
			echo "</tr>";
			echo "</table>";
		
		echo "</td>";
		echo "<td   id='slips' style='padding-bottom:35px; padding-right:40px;'>";
			
			echo "<table border='1'>";
				echo "<tr>";
					echo "<td class ='rotateimage0 centerText'><img src='".SITE_URL."/images/rolledpaper1.png' height=50 width=50/> </td>";
					echo "<td class ='rotateimage1 centerText'><img src='".SITE_URL."/images/rolledpaper2.png' height=50 width=50/> </td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class ='rotateimage2 centerText'><img src='".SITE_URL."/images/rolledpaper3.png' height=50 width=50/> </td>";
					echo "<td class ='rotateimage3 centerText'><img src='".SITE_URL."/images/rolledpaper4.png' height=50 width=50/> </td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td   colspan=2></td>";
					
				echo "</tr>";
			echo "</table>";
			
		echo "</td >";
			echo "<td class='back' style='padding-bottom:10px; padding-right:25px;'>";
			echo "<table>";
			echo "<tr>";
			echo "<td id='";
			if(isset($_SESSION['user4']))
			{
				echo $_SESSION['user4']; 
			}
			echo "'  colspan=2></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td id='u43' ><img src='".SITE_URL."/images/greenarrowright.gif' height=50 width=50/></td>";
			if(isset($_SESSION['user4']))
			{
				echo "<td id='u1' class='";
				echo $_SESSION['user4'];
				echo "'></td>";
			}
			else
			{
				echo "<td id='u1'>";
			}
			if(isset($_SESSION['user4']))
			{
				echo "<h2>".ucfirst($_SESSION['user4'])."</h2>";
			}
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td></td>";
		echo "<td class='back' style='padding-bottom:30px; padding-left:10px;'>";
			echo "<table>";
			echo "<tr>";
			echo "<td id='";
			if(isset($_SESSION['user3']))
			{
				echo $_SESSION['user3']; 
			}
			echo "'  colspan=2></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td id='u32' ><img src='".SITE_URL."/images/greenarrowdown.gif' height=50 width=50/></td>";
			echo "</tr>";
			echo "<tr>";
			if(isset($_SESSION['user3']))
			{
				echo "<td id='u1' class=' ";
				echo $_SESSION['user3'];
				echo " '></td>";
			}
			else
			{
				echo "<td id='u1'>";
			}
			if(isset($_SESSION['user3']))
			{
				echo "<h2>".ucfirst($_SESSION['user3'])."</h2>";
			}
			echo "</td>";
			echo "</tr>";
			echo "</table>";

		echo "</td>";
		echo "<td></td>";
	echo "</tr>";
echo "</table>";
echo "</body>";	
?>
<style>

body
{
	background-image:url(<?php echo SITE_URL .'/images/backgroundimage.jpg' ?>);
	background-repeat:no-repeat;
	background-size:1376px 820px;
}
table #user
{
	height:400px;
}


.tableback
{
background-image:url(<?php echo SITE_URL .'/images/board.gif' ?>);
background-repeat:no-repeat;
background-size:700px 600px;

}
h2
{
	
	color: #fff;
        text-shadow: 0px -1px 4px white, 0px -2px 10px yellow, 0px -10px 20px #ff8000, 0px -18px 40px red;
        font: 24px 'BlackJackRegular';


}
</style>
<?php
echo "<h1 style = 'display:none;'>" .count($b). "</h1>";
?>
