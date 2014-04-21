<?
	// require common code
	require_once("includes/common.php");
	
	// only allow choregraphers access to this page
	if(!$choreo)
		apologize("You are not a choregrapher :(");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<link href="styles.css" rel="stylesheet" type="text/css">
  	<title>AADT: Harvard Asian-American Dance Troupe</title>
  </head>
  <body id="users">
		<div id="wrapper"style="width:100%;">
  		<? include("nav.php"); ?>
			<div class="center3" id="transparent"></div>
  		<div class="center3">
				<? include("sidebar.php"); ?>
				<div id="content">
				  <h1>Dancers</h1>
					<?  
						$choreo_dances = mysql_query("SELECT * FROM dances WHERE id = '$id' AND choreo = '1'");
						// only print contact information for dances user is a choregrapher for
						while($choreo_dance_row = mysql_fetch_array($choreo_dances))
						{
							$dance = $choreo_dance_row["dance"];
							// select all dancers in choregrapher's dance
							$dancers = mysql_query("SELECT * FROM dances WHERE (dance = '$dance' AND id != '1')");
							print('<p>Here is a list of all dancers for <b>' . $dance . ':</b></p>');
							print('<center><table class="formatted">');
							// display contact information for all dancers in selected dance
							print('<tr>');
							print('<td><b>First</b></td>');
							print('<td><b>Email</b></td>');
							print('<td><b>Cell</b></td>');
							print('</tr>');
							
							while ($dancer = mysql_fetch_array($dancers))
							{
									$dancer_id = $dancer["id"];
									$dancer_row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$dancer_id'"));
									print('<tr>');
									print('<td>' . $dancer_row["first"] . ' ' . $dancer_row["last"] . '</td>');
									print('<td>' . $dancer_row["email"] . '</td>');
									print('<td>' . $dancer_row["cell"] . '</td>');								
									print('</tr>');		
							}
							print('</table></center><br>');
						}
					?>
  			</div>
  		</div>
	  </div>
  	<? include("footer.php"); ?>
	</body>
</html>