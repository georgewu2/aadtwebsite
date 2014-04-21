<? 
require_once("includes/common.php"); 

// check if input has been given
if (!isset($_POST['newadmin']))
	die("some parameters not set");

// sanitize input        
$newadmin = htmlspecialchars(mysql_real_escape_string($_POST['newadmin']));

// change selected users access
$update_query = "UPDATE users SET admin =  '1' WHERE  id = '$newadmin' LIMIT 1;";
$result = mysql_query($update_query);

// make sure query was successful
if (!$result)
	die("UPDATE query failed");

    // redirect back to starting page
    header("Location: admin.php");

?>
