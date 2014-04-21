<?

// require common code
require_once("includes/common.php"); 

if (empty($_POST["dancerid"]) || (empty($_POST["dance"]) && empty($_POST["newdance"])))
	apologize("Please fill out all three fields.");

// scrub
$dancerid = mysql_real_escape_string($_POST["dancerid"]);
if(empty($_POST["newdance"]))
	$dance = mysql_real_escape_string($_POST["dance"]);
else
	$dance = mysql_real_escape_string($_POST["newdance"]);
$choreo = mysql_real_escape_string($_POST["choreo"]);

// select
$dancer = mysql_query("SELECT * FROM users WHERE id = $dancerid");
$dancerrow = mysql_fetch_array($dancer);

// prevent duplicate usernames
$sql = "SELECT * FROM dances WHERE id = '$dancerid' AND dance = '$dance'";
$search = mysql_query($sql);

if ($_POST['add'])
{


if (mysql_num_rows($search) > 0)
	apologize("That person is already in the dance. Try again!");
else
	$insert = mysql_query("INSERT INTO dances (id, dance, choreo) VALUES('$dancerid', '$dance', '$choreo')");

}
elseif ($_POST['remove'])
{
	if(mysql_num_rows($search) == 1)
		$delete = mysql_query("DELETE FROM dances WHERE id = '$dancerid' AND dance = '$dance'");
	else
		apologize("That person is not in that dance. Please try again.");
}

?>

<!DOCTYPE html>
<html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link href="styles.css" rel="stylesheet" type="text/css">
  <title>AADT: Harvard Asian-American Dance Troupe</title>
    </head>
    <body id="users">
  <div id="wrapper">
  <? include("nav.php"); ?>
<div class="center" id="transparent">
  </div>
  <div class="center">

      <h1>Update Dancers</h1>
      <p>Success!</p>
      <? 
      	if($_POST['add'])
      		print($dancerrow[first] . ' ' . $dancerrow[last] . ' has been added to ' . $dance . '.');
      	elseif ($_POST['remove'])
	  		print($dancerrow[first] . ' ' . $dancerrow[last] . ' has been removed from ' . $dance . '.');
      ?>
      <p><a href="javascript:history.go(-1);">Back</a></p>

  </div>
  </div>
  <? include("footer.php"); ?>
    </body>
</html>