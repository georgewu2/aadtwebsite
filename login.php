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
    		<h1>Login Page</h1>
		      <form action="login2.php" method="post">
		        <table>
     		     <tr>
        	    <td>Username:</td>
          	  <td><input name="username" type="text"></td>
	          </tr>
  	        <tr>
    	        <td>Password:</td>
      	      <td><input name="password" type="password"></td>
        	  </tr>
          	<tr>
            	<td></td>
            	<td><input type="submit" value="Log In"></td>
          	</tr>
        	</table>
	      </form>
				<p> or <a href="register.php">register</a> for an account </p>
			</div>
		</div>
    <? include("footer.php"); ?>
  </body>
</html>
