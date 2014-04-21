<?
	// require common code
	require_once("includes/common.php"); 
	
	// check if user is the superadmin
	if($userrow["username"] != "aadt")
		apologize("You are not the superadmin!");
		
	$dances	= mysql_query("SELECT DISTINCT dance FROM dances");

	// remove admin access from selected user
	if(isset($_GET['rmaccess'])) 
	{
		$userid = htmlspecialchars(mysql_real_escape_string($_GET['rmaccess']));
		$sql = "UPDATE users SET admin =  '0' WHERE  id = '$userid' LIMIT 1;";
		$result = mysql_query($sql);
		if(!$result)
			die("UPDATE query failed");
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<link href="styles.css" rel="stylesheet" type="text/css">
  	<title>AADT: Harvard Asian-American Dance Troupe</title>
  </head>
  <script type="text/javascript">	

	// allows admins and choreographers to dynamically delete posts  
	$(document).ready(function() {
  	$('a.delete').click(function(e) {
    	e.preventDefault();
    	var parent = $(this).parent();
    $.ajax({
      type: 'get',
      url: 'delete.php',
      data: {delete: parent.attr('id').replace('record-','')},
      success: function() {
        parent.slideUp(300,function() {
          parent.remove();
        });
      }
		});
  	});
	});
      
	</script>
  <body id="users">
		<div id="wrapper"style="width:100%;">
  		<? include("nav.php"); ?>
			<div class="center3" id="transparent"></div>
  		<div class="center3">
				<? include("sidebar.php"); ?>
				<div id="content">
					<h1>Current Admins</h1>
					<h2>Remove Access</h2>
					<center><table class="formatted">
						<tr>
							<td><b>Name</b></td>
							<td><b>Delete?</b></td>
						</tr>
						<? 
						
							// display list of current admins 
							$admins = mysql_query("SELECT * FROM users WHERE admin = 1 ORDER by id ASC");
							while($adminsrow = mysql_fetch_array($admins))
							{
								print('<tr id="' . $adminsrow["id"] . '" ><td>' . $adminsrow["first"] . " " . $adminsrow["last"] . '</td><td>');
								if($adminsrow["username"] != "aadt")
									print('<a href="?rmaccess=' . $adminsrow['id'] . '" class="rmaccess">[ x ]</a></td></tr>');
							}
						?>
					</table></center>
					<h2>Grant Access</h2>
						<form action="addadmin.php" method="post">
							<select name="newadmin">
								<?
									// select menu with list of all members without admin access
									$allusersresult = mysql_query("SELECT * FROM users WHERE admin = 0 ORDER by first ASC");
									while($allusersrow = mysql_fetch_array($allusersresult))
										print('<option value="' . $allusersrow["id"] . '">' . $allusersrow["first"] . " " . $allusersrow["last"] . '</option>');
								?>
							</select>
							<input type="submit" value="Grant Access">
						</form>
				</div>
		  </div>
  	</div>
  	<? include("footer.php"); ?>
	</body>
</html>