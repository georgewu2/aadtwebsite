<?
// require common code
require_once("includes/common.php"); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>AADT: Harvard Asian-American Dance Troupe</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="styles.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
  </head>
	<body id="users">
		<div id="wrapper"style="width:100%;">
		  <? include("nav.php"); ?>
			<div class="center3" id="transparent"></div>
			<div class="center3">
				<? include("sidebar.php"); ?>
				<div id="content">
					<h1>Inventory</h1>
					<div id="enter">
						<h2>Add/Update Gear</h2>
						<form action="inventory2.php" method="post">
							<table>
								<tr>
								<td>Clothing:</td>
								<td><input name="clothing" type="text"></td>
								</tr>
								<tr>
								<td>Quantity:</td>
								<td><input name="quantity" type="text"></td>
								</tr>
								<tr>
								<td>Dance:</td>
								<td><input name="dance" type="text"></td>
								</tr>
								<tr>
								<td colspan="2"><input type="submit" value="Submit"></td>
								</tr>
							</table>
						</form>
					</div>
					<br><br>
					<div class="section">
						<h2>Search Inventory:</h2>
						<a href="search.php">Search</a>
					</div>				
				<a href="index.php">Go Back</a>
				</div>
			</div>
		</div>
		<? include("footer.php"); ?>
	</body>
</html>