<?
require_once("../includes/common.php"); 

$columns = "`clothing` , `dance`, `color`, `quantity`, `size`, `link`, `type`";

$temp = "http://www.hpair.org/inventory.csv";

$handle = fopen($temp, "r");

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$data[0] = htmlspecialchars($data[0]);
		$data[1] = htmlspecialchars($data[1]);
		$data[2] = htmlspecialchars($data[2]);
		$data[3] = addslashes(htmlspecialchars($data[3]));
		$data[4] = htmlspecialchars($data[4]);
		$data[5] = htmlspecialchars($data[5]);
		$data[6] = htmlspecialchars($data[6]);		
												
	
		$import="INSERT into inventory ( $columns ) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
		mysql_query($import) or die(mysql_error());
	}
	//mysql_query("INSERT INTO inventory ( $columns ) VALUES('$clothing','$dance','$color','$quantity','$size','$link','$type') "); 


fclose($handle);
?>