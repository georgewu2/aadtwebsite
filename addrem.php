<?
	// require common code
	require_once("includes/common.php"); 
	
	// check if current user is an administrator
	if(!$admin)
		apologize("You are not an administrator!");
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
					<h1>Update Dancers</h1>
					<? print('<p>' . $message . '</p>'); ?>
					<form action="addrem2.php" method="post">
						<table>
							<tr><td>Name:</td>
								<td><select name="dancerid">
									<option value=""></option>
									<? 
									
										// display all users (dancers) as an option
										$allusers = mysql_query("SELECT * FROM users ORDER by first ASC");
										while($allusers_row = mysql_fetch_array($allusers))
											print('<option value="' . $allusers_row["id"] . '">' . $allusers_row["first"] . " " . $allusers_row["last"] . '</option>');
									?>
								</select></td>
							</tr>
							<tr>
								<td>Existing Dance:</td>
								<td><select name="dance">
									<option value=""></option>
	﻿          			<?
										// display all existing dances
										$dist_dances	= mysql_query("SELECT DISTINCT dance FROM dances");
										while ($dist_dance = mysql_fetch_array($dist_dances))
										{
											print('<option value="' . $dist_dance["dance"]. '">' . $dist_dance["dance"] . '</option>');
										}
									?>
								</select></td>
							<tr>
								<td>(New Dance):</td>
								<td><input name="newdance" type="text"></td>
							</tr>
							<tr>
								<td colspan="2"><input type="checkbox" name="choreo" value="1"> Choreographer?</td>            
							</tr>
							<tr>
								<td olspan="2"><input type="submit" name="add" value="Add">
								<input type="submit" name="remove" value="Remove"></td>
							</tr>
						</table>
					</form>
  			</div>
  		</div>
	  </div>
  	<? include("footer.php"); ?>
	</body>
</html>