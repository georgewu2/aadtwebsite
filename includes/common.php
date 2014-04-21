<?

/***********************************************************************
 * 
 * Adapted from cdn.cs50.net/2011/fall/psets/7/pset7/includes/common.php
 *
 **********************************************************************/



// display errors and warnings but not notices
ini_set("display_errors", true);
error_reporting(E_ALL ^ E_NOTICE);

// enable sessions, restricting cookie to /~username/pset7/
     if (preg_match("{^(/~[^/]+/new/)}", $_SERVER["REQUEST_URI"], $matches))
         session_set_cookie_params(0, $matches[1]);
session_start();

// requirements
require_once("constants.php");
require_once("helpers.php");

// require authentication for most pages
if (!preg_match("{/(:?index|login|logout|register|search|get1)\d*\.php$}", $_SERVER["PHP_SELF"]))
  {
    if (!isset($_SESSION["id"]))
      redirect("login.php");
  }

// connect to database server
if (($connection = @mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD)) === false)
  apologize("Could not connect to database server.");

// select database
if (@mysql_select_db(DB_NAME, $connection) === false)
  apologize("Could not select database (" . DB_NAME . ").");

// get session ID of current user
$id = $_SESSION["id"];

// execute query, get current user's information
$user = mysql_query("SELECT * FROM users WHERE id = '$id'");
$userrow = mysql_fetch_array($user);

// check if current user is an administrator
if($userrow["admin"])
	$admin = true;

// check if current user is a choreographer
$user_dances = mysql_query("SELECT * FROM dances WHERE id = '$id'");
while($user_dance = mysql_fetch_array($user_dances))
{
	if ($user_dance["choreo"])
		$choreo = true;
}

?>