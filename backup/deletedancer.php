<?
if (!isset($_GET['rmdancer']) || !isset($_GET['dance']))
	die("some parameters not set");

 $chosenuser = htmlspecialchars(mysql_real_escape_string($_GET['rmdancer']));
 $chosendance = htmlspecialchars(mysql_real_escape_string($_GET['dance']));
 $delete_query = "DELETE * FROM dances WHERE  (id = '$chosenuser' AND dance = '$chosendance') LIMIT 1;";
 $result = mysql_query($delete_query);

    /* make sure our query is successful */
if (!$result)
	die("DELETE query failed");

    /* change the redirect header for your localhost!! */
    header("Location: dancers.php");

?>