<?
    /*
     * get1.php
     * Source: Kenny Yu section sample code (pokemon search)
     * Grabs all the clothing names that match the starting string.
     */
	header("content-type: text/plain");

    require_once("includes/common.php");
    
    /* make sure type was provided */
    if (!isset($_GET["q"]))
        die("some parameter was not set");
    
    /* must escape user input */
    $fragment = htmlspecialchars(mysql_real_escape_string($_GET['q']));
    
    $select_query;
    
    if ($fragment == "") {
    	$select_query = " SELECT * FROM inventory WHERE 1 ORDER BY id ASC";
    }
    else 
    /* query to fetch all the pokemon with the certain type */  
    {
    	$select_query = "SELECT * FROM inventory WHERE (clothing REGEXP '^$fragment' OR 
    											   quantity REGEXP '^$fragment' OR 
    											   dance REGEXP '^$fragment'  OR 
    											   color REGEXP '^$fragment' OR 
    											   size REGEXP '^$fragment' OR 
    											   link REGEXP '^$fragment' OR 
    											   type REGEXP '^$fragment') ORDER BY id ASC";
	}
    $result = mysql_query($select_query);
    
    /* make sure our query is successful */
    if (!$result)
        die("SELECT query failed");
    
    /* $row is an associative array with the database field names */
    $inventory = array();
    while ($row = mysql_fetch_assoc($result)) {
        $inventory[] = $row;	
    }
	echo(json_encode($inventory));
?>