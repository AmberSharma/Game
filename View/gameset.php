<?php
print_r($_SESSION);
echo "<center>";
echo "<table id='user' border='1'>";
	echo "<tr >";
		echo "<td class='centerText'></td>";
		echo "<td class='centerText'>";
			echo "<center>";
			echo "<table border='1'>";
			echo "<tr>";
			
			echo "<td id='";
			if(isset($_SESSION['user1']))
			{
				echo $_SESSION['user1']; 
			}
			echo "' class='centerText' colspan=2></td>";
			echo "</tr>";
			echo "<tr>";
			if(isset($_SESSION['user1']))
			{
				echo "<td id='u1' class='centerText  ";
				echo $_SESSION['user1'];
				echo " '>";
			}
			else
			{
				echo "<td id='u1' class='centerText'>";
			}
			if(isset($_SESSION['user1']))
			{
				echo ucfirst($_SESSION['user1']);
			}
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td id='u10' class='centerText'><img src='".SITE_URL."/images/greenarrowup.gif' height=50 width=50/></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td id='popmessage' class='centerText'></td>";
			echo "</tr>";
			echo "</table>";
			echo "</center>";
		echo "</td>";
		echo "<td class='centerText'></td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td class='centerText'>";
		echo "<center>";
		echo "<table>";
			echo "<tr>";
			echo "<td id='";
			if(isset($_SESSION['user2']))
			{
				echo $_SESSION['user2']; 
			}
			echo "' class='centerText' colspan=2></td>";
			echo "</tr>";
			echo "<tr>";
			if(isset($_SESSION['user2']))
			{
				echo "<td id='u1' class='centerText  ";
				echo $_SESSION['user2'];
				echo " '>";
			}
			else
			{
				echo "<td id='u1' class='centerText'>";
			}
			if(isset($_SESSION['user2']))
			{
				echo ucfirst($_SESSION['user2']);
			}
			echo "</td>";
			echo "<td id='u21' class='centerText'><img src='".SITE_URL."/images/greenarrowleft.gif' height=50 width=50/></td>";
			echo "</tr>";
			echo "</table>";
		echo "<center>";
		echo "</td>";
		echo "<td  class='centerText' id='slips'>";
			echo "<center>";
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
					echo "<td  class='centerText' colspan=2></td>";
					
				echo "</tr>";
			echo "</table>";
			echo "</center>";
		echo "</td class='centerText'>";
			echo "<td class='centerText'>";
			echo "<center>";
			echo "<table>";
			echo "<tr>";
			echo "<td id='";
			if(isset($_SESSION['user4']))
			{
				echo $_SESSION['user4']; 
			}
			echo "' class='centerText' colspan=2></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td id='u43' class='centerText'><img src='".SITE_URL."/images/greenarrowright.gif' height=50 width=50/></td>";
			if(isset($_SESSION['user4']))
			{
				echo "<td id='u1' class='centerText  ";
				echo $_SESSION['user4'];
				echo " '>";
			}
			else
			{
				echo "<td id='u1' class='centerText'>";
			}
			if(isset($_SESSION['user4']))
			{
				echo ucfirst($_SESSION['user4']);
			}
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "</center>";
		echo "</td class='centerText'>";
	echo "</tr>";
	echo "<tr>";
		echo "<td class='centerText'></td>";
		echo "<td class='centerText'>";
			echo "<center>";
			echo "<table>";
			echo "<tr>";
			echo "<td id='";
			if(isset($_SESSION['user3']))
			{
				echo $_SESSION['user3']; 
			}
			echo "' class='centerText' colspan=2></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td id='u32' class='centerText'><img src='".SITE_URL."/images/greenarrowdown.gif' height=50 width=50/></td>";
			echo "</tr>";
			echo "<tr>";
			if(isset($_SESSION['user3']))
			{
				echo "<td id='u1' class='centerText  ";
				echo ucfirst($_SESSION['user3']);
				echo " '>";
			}
			else
			{
				echo "<td id='u1' class='centerText'>";
			}
			if(isset($_SESSION['user3']))
			{
			echo $_SESSION['user3'];
			}
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "</center>";
		echo "</td>";
		echo "<td class='centerText'></td>";
	echo "</tr>";
echo "</table>";
echo "</center>";
	
?>
<style>
.centerText{
   text-align: center;
}
</style>
