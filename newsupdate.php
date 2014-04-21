<?
	// require common code
	require_once("includes/common.php"); 
	
	// only allow administrators or choreographers access to this page
	if (!$admin && !$choreo)
		apologize("You are not an admin/choreographer. Go away!");
		
	if(isset($_POST['submit']))
	{
	
		// check if all necessary information was filled in
		if (empty($_POST["title"]) || empty($_POST["type"]) || empty($_POST["text"]))
			$message="Please fill out all three fields.";
		else
		{
			// sanitize form input
			$title = htmlspecialchars(mysql_real_escape_string($_POST["title"]));
			$type = htmlspecialchars(mysql_real_escape_string($_POST["type"]));
			$text = htmlspecialchars(mysql_real_escape_string($_POST["text"]));
			$video = htmlspecialchars(mysql_real_escape_string($_POST["video"]));
			$video = str_replace("watch?v=", "v/", $video);
			$date = time();
			
			// post submitted information
			$sql = "INSERT INTO news (type, date, title, text, video) VALUES('$type', '$date', '$title', '$text', '$video')";
			$post = mysql_query($sql);
			
			// check if mySQL query was successful
			if($post)
				$message="Your post was successful!";
			else
				die("INSERT query failed");
		}
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
  <body id="users">
		<div id="wrapper"style="width:100%;">
  		<? include("nav.php"); ?>
			<div class="center3" id="transparent"></div>
  		<div class="center3">
				<? include("sidebar.php"); ?>
				<div id="content">
					<h1>Post News</h1>
					<? print('<p>' . $message . '</p>'); ?>
					<form action="newsupdate.php" method="post">
						<table>
							<tr>
								<td>Title:</td>
								<td><input name="title" type="text"></td>
							</tr>
							<tr>
								<td>To:</td>
								<td><select name="type">
									<option value=""></option>
	﻿          			<?
										// allow administrators access to post to the website and to all members
										if($userrow["admin"])
										{
											print('<option value="Home">Website</option>');
											print('<option value="All">Members</option>');
										}

										$choreo_dances = mysql_query("SELECT * FROM dances WHERE id = '$id' AND choreo = '1'");
	
										// allow choregraphers ability to post news for their dances
										while ($choreo_dance_row = mysql_fetch_array($choreo_dances))
											print('<option value="' . $choreo_dance_row["dance"]. '">' . $choreo_dance_row["dance"] . '</option>');
									?>
								</select></td>
							</tr>
							<tr>
								<td style="vertical-align:top">Message:</td>
								<td><textarea rows="6" cols="35" name="text"></textarea></td>
							</tr>
					 		<tr>
								<td>Youtube Link:</td>
								<td><input name="video" type="text"></td>
							</tr>
							<tr>
								<td></td>
								<td><input name="submit" type="submit" value="Post"></td>
							</tr>
						</table>
					</form>				
				</div>
			</div>
		</div>
		<? include("footer.php"); ?>
		</body>
</html>