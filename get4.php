<?
    /*
     * get1.php
     * Source: Kenny Yu section sample code (pokemon search)
     * Grabs all the dance names that match the starting string.
     */
	header("content-type: text/plain");

    require_once("includes/common.php");
    
    /* make sure type was provided */
    if (!isset($_GET["q"]))
        die("some parameter was not set");
    
    /* must escape user input */
    $fragment = htmlspecialchars(mysql_real_escape_string($_GET['q']));
    
    /* query to fetch all the pokemon with the certain type */  
    $select_query = "SELECT * FROM users WHERE last REGEXP '^$fragment' LIMIT 0,10";
    $result = mysql_query($select_query);
    
    /* make sure our query is successful */
    if (!$result)
        die("SELECT query failed");
    
    /* $row is an associative array with the database field names */
    $members = array();
    while ($row = mysql_fetch_assoc($result)) {
        $members[] = $row;	
    }
	echo(json_encode($members));
?>