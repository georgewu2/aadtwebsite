<? 
require_once("includes/common.php"); 

// delete post from database
if(isset($_GET['delete'])) 
{
 $link = htmlspecialchars(mysql_real_escape_string($_GET['delete']));
 $sql = "DELETE FROM news WHERE date = '$link'";
 $result = mysql_query($sql);
}
?>