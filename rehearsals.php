<?
// require common code
require_once("includes/common.php"); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link href="styles.css" rel="stylesheet" type="text/css">
  	<title>AADT: Harvard Asian-American Dance Troupe</title>
  </head>
  <body id="users">
	  <div id="wrapper"style="width:100%;">
		<? include("nav.php"); ?>
			<div class="center3" id="transparent">
  		</div>
  		<div class="center3">
  			<? include("sidebar.php"); ?>
				<div id="content">
					<h1>Rehearsals</h1>
					<center><iframe src="https://www.google.com/calendar/b/0/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=400&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=49rpgb516khrnkpdf2t5persao%40group.calendar.google.com&amp;color=%23182C57&amp;ctz=America%2FNew_York" style=" border-width:0 " width="500" height="400" frameborder="0" scrolling="no"></iframe></center>
				</div>
			</div>
  	</div>
  	<? include("footer.php"); ?>
  </body>
</html>