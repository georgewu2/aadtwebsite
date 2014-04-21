<?
// require common code
require_once("includes/common.php"); 

$select_query = " SELECT * FROM inventory WHERE 1 ORDER BY id ASC";
$result = mysql_query($select_query);

/* make sure our query is successful */
if (!$result)
	die("SELECT query failed");

/* $row is an associative array with the database field names */


?>

<!DOCTYPE html>
<html>
	<head>
  	<title>AADT Inventory Search</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    	<link href="styles.css" rel="stylesheet" type="text/css">
    	<style type="text/css">

			.thumbnail{
			position: relative;
			z-index: 0;
			}
			
			.thumbnail:hover{
			background-color: transparent;
			z-index: 50;
			}
			
			.thumbnail span{ /*CSS for enlarged image*/
			position: absolute;
			padding: 5px;
			left: -1000px;
			visibility: hidden;
			text-decoration: none;
			}
			
			.thumbnail span img{ /*CSS for enlarged image*/
			border-width: 0;
			padding: 0px;
			}
			
			.thumbnail:hover span{ /*CSS for enlarged image on hover*/
			visibility: visible;
			top: 0;
			left: 60px; /*position where enlarged image should offset horizontally */
			
			}

		</style>

		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript">
		
		function search_init() {
			$("#query").keyup(function(){
				var query = $("#query").val();
				//if (query != "") {
					/*var selected = $("#searchtype option:selected").val();
					if(selected=="Clothing")
					{*/
						$.ajax({
						url: "get1.php",
						data: {q: query},
						success: add_inventory,
						type: "GET"
						});
					//}
					/*if(selected=="Dance")
					{
						$.ajax({
						url: "get2.php",
						data: {q: query},
						success: add_inventory,
						type: "GET"
						});
					}*/

				//}

			});
		}
		
		$(document).ready(search_init);
		
		/* parse the json data and add it to our table */

		
		function add_inventory(data) {
			$("#results").empty();
			pardata = JSON.parse(data);
			for (var row in pardata) {
				//var link = "<a href='" + pardata[row]["link"] + "'>";
				//var td_clothing = $("<td>").html(link + pardata[row]["clothing"] + "</a>");
				var td_clothing;
				if (pardata[row]["link"] == "")
					td_clothing = $("<td>").html(pardata[row]["clothing"]);
				else {
					var link = "<a class='thumbnail' href='" + pardata[row]["link"] + "'>";
					td_clothing = $("<td>").html(link + pardata[row]["clothing"] + "<span><img width='300px' src='" + pardata[row]["link"] + "'/></span></a>");
				}
				var td_quantity = $("<td>").html(pardata[row]["quantity"]);
				var td_color = $("<td>").html(pardata[row]["color"]);
				var td_dance = $("<td>").html(pardata[row]["dance"]);
				var td_type = $("<td>").html(pardata[row]["type"]);				
				var newrow = $("<tr>");
				newrow.append(td_clothing);
				newrow.append(td_quantity);
				newrow.append(td_color);				
				newrow.append(td_dance);
				newrow.append(td_type);
				$("#results").append(newrow);
			}
		}
		</script>
	</head>
	<body id="users">
		<div id="wrapper"style="width:100%;">
	  	<? include("nav.php"); ?>
			<div class="center3" id="transparent"></div>
			<div class="center3">
				<? include("sidebar.php"); ?>
				<div id="content">
					<h1>Inventory</h1>
					<div id="search">
						<form action="search.php" method="post">
							<table>
								<tr>
									<td> Search for </td>
									<td>
										<input id="query" name="query" type="text">
									</td>
									<!--<td> by </td>
									<td>
										<select id="searchtype" name="searchmethod">
											<option value="Clothing">Clothing</option>
											<option value="Dance">Dance</option>
										</select>
									</td>-->
								</tr>
							</table>
						</form>
						<center><table class="formatted">		
							<tr>
								<td><b>Item</b></td>
								<td><b>Quantity</b></td>
								<td><b>Color</b></td>								
								<td><b>Style</b></td>
								<td><b>Type</b></td>								
							</tr>
							<tbody id="results">
							
							<? 
								while($row = mysql_fetch_array($result)) {
									print("<tr>");
									if ($row["link"] == "")
										print("<td>" . $row["clothing"] . "</td>");									
									else
										print("<td><a class='thumbnail' href='" . $row["link"] . "'>" .   $row["clothing"] . "<span><img width='300px' src='" . $row["link"] . "'/>" . "</span></a></td>");
									//print("<td><a href='" . $row["link"] . "'>" . $row["clothing"] . "</a></td>");									
									print("<td>" . $row["quantity"] . "</td>");
									print('<td>' . $row["color"] . '</td>');									
									print('<td>' . $row["dance"] . '</td>');									
									print('<td>' . $row["type"] . '</td>');									
									print('</tr>');
								} 

							?>
							</tbody>
						</table></center>
					</div>
				</div>
			</div>
		</div>
		<? include("footer.php"); ?>
	</body>
</html>