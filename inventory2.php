<?
    //require common code
    require_once("includes/common.php"); 
    
    //check if username and password are valid
    if(!empty($_POST["clothing"]) && !empty($_POST["quantity"]) && !empty($_POST["dance"]))
	{
		// escape username to avoid SQL injection attacks
		$clothing = mysql_real_escape_string($_POST["clothing"]);
		$quantity = mysql_real_escape_string($_POST["quantity"]);
		$dance = mysql_real_escape_string($_POST["dance"]);

		//insert new user into our users table
		$sql = "INSERT INTO inventory (clothing, quantity, dance) VALUES('$clothing', '$quantity', '$dance') ON DUPLICATE KEY UPDATE quantity = '$quantity'";
		
		//check error
		$result = mysql_query($sql);
		if($result == false)
		{
			apologize($sql);
		}

		redirect("inventory.php");
	}
	
	apologize("Invalid input!");
?>