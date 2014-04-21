<?

// require common code
require_once("includes/common.php"); 

// check
if (empty($_POST["title"]) || empty($_POST["type"]) || empty($_POST["text"]))
	apologize("Please fill out all three fields.");

// scrub
$title = mysql_real_escape_string($_POST["title"]);
$type = mysql_real_escape_string($_POST["type"]);
$text = mysql_real_escape_string($_POST["text"]);
$video = mysql_real_escape_string($_POST["video"]);

$video = str_replace("watch?v=", "v/", $video);

$date = time();
// insert
$sql = "INSERT INTO news (type, date, title, text, video) VALUES('$type', '$date', '$title', '$text', '$video')";
$post = mysql_query($sql);

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

      <h1>News Post</h1>
      <p>Success!</p>
	  <? print('<p>You have successfully posted to news for ' . $type . ".") ?>
      <p><a href="javascript:history.go(-1);">Back</a></p>

  </div>
  </div>
  <? include("footer.php"); ?>
    </body>
</html>