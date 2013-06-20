<?php require_once "/var/www/Game/trunk/libraries/constant.php"; ?>
<script src="<?php echo SITE_URL;?>/js/jquery.tools.min.js"></script>
<style>
#container
{
	background-image:url(<?php echo SITE_URL .'/images/board.gif' ?>);
	background-repeat:no-repeat;
	background-size:668px 475px;
	background-color: transparent;
  	box-shadow: 40px 40px 100px 40px #000;
	margin-top:-200px;
	margin-left:346px;
	height:475px;
	width:670px;
}

h2
{
	
	color: #fff;
        text-shadow: 0px -1px 4px white, 0px -2px 10px yellow, 0px -10px 20px #ff8000, 0px -18px 40px red;
        font: 24px 'BlackJackRegular';


}
</style>
<?php
echo '<div id="container">';
	echo '<div style="height:158px;">';
		echo '<div style="height:157px;width:221px;float:left;">'.'</div>';
		echo '<div style="height:157px;width:221px;margin-left:223px;">';
			echo '<div style="height:45px;width:216px;margin:2px;" ';
			if(isset($_SESSION['user1']))
			{
				echo 'id="';
				echo $_SESSION['user1']; 
				echo '"';
			}
			echo '></div>';
			echo '<div style="height:45px;width:150px;margin:2px;float:left;" >';
			if(isset($_SESSION['user1']))
			{
				echo "<center>";
				echo '<h2>'.ucfirst($_SESSION['user1']).'</h2>';
				echo "</center>";
			}
			echo '</div>';
			
			echo '<div style="height:45px;width:60px;margin-top:2px;margin-left:153px;margin-bottom:2px;"';
			if($_SESSION['user1'])
			{
				echo 'id="u1" class="';
				echo $_SESSION['user1'];
				echo '"';
			}			
			echo '> </div>';
			echo '<div style="height:45px;width:100px;margin:2px;float:left;" id="u10">';
				echo '<img src="'.SITE_URL.'/images/greenarrowup.gif" height=50 width=50 style="margin-left:30px;"/>';
			echo '</div>';
			echo '<div style="height:45px;width:110px;margin:2px;margin-left:105px;" id="popmessage">'.'</div>';
		echo '</div>';
		echo '<div style="height:157px;width:221px;float:right;margin-top:-160px;">'.'</div>';
	echo '</div>';
	echo '<div style="height:158px;">';
		echo '<div style="height:157px;width:221px;float:left;">';
			echo '<div style="height:45px;width:216px;margin:2px;"';
			if(isset($_SESSION['user2']))
			{
				echo 'id="';
				echo $_SESSION['user2']; 
				echo '"';
			}
			echo '></div>';
			echo '<div style="height:45px;width:150px;margin:2px;float:left;" >';
			if(isset($_SESSION['user2']))
			{
				echo '<h2>'.ucfirst($_SESSION['user2']).'</h2>';
			}
			echo '</div>';
			echo '<div style="height:45px;width:60px;margin-top:2px;margin-left:153px;margin-bottom:2px;"';
			if($_SESSION['user2'])
			{
				echo 'id="u2" class="';
				echo $_SESSION['user2'];
				echo '"';
			}			
			echo '> </div>';
			echo '<div style="height:45px;width:100px;margin:2px;float:left;" id="u21">';
				echo '<img src="'.SITE_URL.'/images/greenarrowup.gif" height=50 width=50 style="margin-left:30px;"/>';
			echo '</div>';
			echo '<div style="height:45px;width:110px;margin:2px;margin-left:105px;">'.'</div>';	
		echo '</div>';
		echo '<div style="height:157px;width:221px;margin-left:223px;" id="slips">';
			echo '<table style="height:100px;width:100px;margin-left:55px;margin-top:20px;">';
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
		echo '</div>';
		echo '<div style="height:157px;width:221px;float:right;margin-top:-160px;">';
			echo '<div style="height:45px;width:216px;margin:2px;"';
			if(isset($_SESSION['user4']))
			{
				echo 'id="';
				echo $_SESSION['user4']; 
				echo '"';
			}
			echo '></div>';
			echo '<div style="height:45px;width:60px;margin-top:2px;margin-bottom:2px;float:left;"';
			if($_SESSION['user4'])
			{
				echo 'id="u3" class="';
				echo $_SESSION['user4'];
				echo '"';
			}			
			echo '> </div>';
			echo '<div style="height:45px;width:150px;margin:2px;margin-left:62px;" >';
			if(isset($_SESSION['user4']))
			{
				echo '<h2>'.ucfirst($_SESSION['user4']).'</h2>';
			}
			echo '</div>';
			echo '<div style="height:45px;width:110px;float:left;margin-left:-60px;">'.'</div>';
			echo '<div style="height:45px;width:100px;margin-left:115px;" id="u32">';
				echo '<img src="'.SITE_URL.'/images/greenarrowup.gif" height=50 width=50 />';
			echo '</div>';
			
		echo '</div>';
	echo '</div>';
	echo '<div style="height:158px;">';
		echo '<div style="height:157px;width:221px;float:left;">'.'</div>';
		echo '<div style="height:157px;width:221px;margin-left:223px;">';
			echo '<div style="height:45px;width:216px;margin:2px;"';
			if(isset($_SESSION['user3']))
			{
				echo 'id="';
				echo $_SESSION['user3']; 
				echo '"';
			}
			echo '></div>';
			echo '<div style="height:45px;width:150px;margin:2px;float:left;" >';
			if(isset($_SESSION['user3']))
			{
				echo '<h2>'.ucfirst($_SESSION['user3']).'</h2>';
			}
			echo '</div>';
			echo '<div style="height:45px;width:60px;margin-top:2px;margin-left:153px;margin-bottom:2px;"';
			if($_SESSION['user3'])
			{
				echo 'id="u3" class="';
				echo $_SESSION['user3'];
				echo '"';
			}			
			echo '> </div>';
			echo '<div style="height:45px;width:100px;margin:2px;float:left;" id="u43">';
				echo '<img src="'.SITE_URL.'/images/greenarrowup.gif" height=50 width=50 style="margin-left:30px;"/>';
			echo '</div>';
			echo '<div style="height:45px;width:110px;margin:2px;margin-left:105px;">'.'</div>';	
		echo '</div>';
		echo '<div style="height:157px;width:221px;float:right;margin-top:-160px;">'.'</div>';
	echo '</div>';
echo '</div>';
echo "<h1 style = 'display:none;'>" .count($b). "</h1>";
?>
