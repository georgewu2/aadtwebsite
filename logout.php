<?

// require common code
require_once("includes/common.php"); 

// log out current user, if any
logout();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>	
  	<link href="styles.css" rel="stylesheet" type="text/css">
    <title>AADT: Harvard Asian-American Dance Troupe</title>
  </head>
  <body id="login">
  	<div id="wrapper">
			<? include("nav.php"); ?>
    	<div class="center" id="transparent">
    	</div>
    	<div class="center">
	    		<h1>Home</h1>
  				<p>Bye! Sign in again soon!</p>
  				<p><a href="login.php">Log back in</a></p>
    		</div>
			</div>
    <? include("footer.php"); ?>
  </body>
</html>
