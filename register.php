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
    		<h1>Register</h1>
    		<form action="register2.php" method="post">
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
							<td>Password (again):</td>
							<td><input name="password2" type="password"></td>
						</tr>
						<tr>
							<td>First Name:</td>
							<td><input name="first" type="text"></td>
						</tr>
						<tr>
							<td>Last Name:</td>
							<td><input name="last" type="text"></td>
						</tr>
						<tr>
							<td>E-mail:</td>
							<td><input name="email" type="text"></td>
						</tr>
						<tr>
							<td>Cell Phone #:</td>
							<td><input name="cell" type="text"></td>
						</tr>
						<tr>
							<td>ID #:</td>
							<td><input name="id" type="text"></td>
						</tr>          
						<tr>
							<td>Class:</td>
							<td>
								<select name="class">
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2013">2014</option>
									<option value="2015">2015</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Dorm or House:</td>
							<td>
								<select name="dorm">
									<option value=""></option>
									<option value="Apley Court">Apley Court</option>
									<option value="Canaday">Canaday</option>
									<option value="Grays">Grays</option>
									<option value="Greenough">Greenough</option>
									<option value="Hollis">Hollis</option>
									<option value="Holworthy">Holworthy</option>
									<option value="Hurlbut">Hurlbut</option>
									<option value="Lionel">Lionel</option>
									<option value="Matthews">Matthews</option>
									<option value="Mower">Mower</option>
									<option value="Pennypacker">Pennypacker</option>
									<option value="Stoughton">Stoughton</option>
									<option value="Straus">Straus</option>
									<option value="Thayer">Thayer</option>
									<option value="Weld">Weld</option>
									<option value="Wigglesworth">Wigglesworth</option>
									<option value="Adams House">Adams House</option>
									<option value="Cabot House">Cabot House</option>
									<option value="Currier House">Currier House</option>
									<option value="Dunster House">Dunster House</option>
									<option value="Eliot House">Elliot House</option>
									<option value="Kirkland House">Kirkland House</option>
									<option value="Leverett House">Leverett House</option>
									<option value="Lowell House">Lowell House</option>
									<option value="Mather House">Mather House</option>
									<option value="Pforzheimer House">Pforzheimer House</option>
									<option value="Quincy House">Quincy House</option>
									<option value="Winthrop House">Winthrop House</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Register"></td>
						</tr>
					</table>
     	 	</form>
	    </div>
		</div>
    <? include("footer.php"); ?>
  </body>
</html>