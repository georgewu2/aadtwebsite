<?
	// require common code
	require_once("includes/common.php"); 

	// check if current user is an administrator
	if(!$admin)
		apologize("You are not an administrator!");
?>

<!DOCTYPE html>
<html>
	<head>
  	<title>AADT Inventory Search</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="styles.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript">
		
		function search_init() {
			$("#query").keyup(function(){
				var query = $("#query").val();
				if (query != "") {
					var selected = $("#searchtype option:selected").val();
					if(selected=="first")
					{
						$.ajax({
						url: "get3.php",
						data: {q: query},
						success: add_dancer,
						type: "GET"
						});
					}
					if(selected=="last")
					{
						$.ajax({
						url: "get4.php",
						data: {q: query},
						success: add_dancer,
						type: "GET"
						});
					}
					if(selected=="dorm")
					{
						$.ajax({
						url: "get5.php",
						data: {q: query},
						success: add_dancer,
						type: "GET"
						});
					}					

				}
			});
		}
		
		$(document).ready(search_init);
		
		/* parse the json data and add it to our table */

		
		function add_dancer(data) {
			$("#results").empty();
			pardata = JSON.parse(data);
			for (var row in pardata) {
				var td_first = $("<td>").html(pardata[row]["first"]);
				var td_last = $("<td>").html(pardata[row]["last"]);
				var td_email = $("<td>").html(pardata[row]["email"]);
				var td_cell = $("<td>").html(pardata[row]["cell"]);
				var td_dorm = $("<td>").html(pardata[row]["dorm"]);				
				var newrow = $("<tr>");
				newrow.append(td_first);
				newrow.append(td_last);
				newrow.append(td_email);
				newrow.append(td_cell);				
				newrow.append(td_dorm);
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
					<h1>Search for Dancers</h1>
					<div id="search">
						<form action="search.php" method="post">
							<table>
								<tr>
									<td> Search for </td>
									<td>
										<input id="query" name="query" type="text">
									</td>
									<td> by </td>
									<td>
										<select id="searchtype" name="searchmethod">
											<option value="first">First</option>
											<option value="last">Last</option>
											<option value="dorm">Dorm</option>
										</select>
									</td>
								</tr>
							</table>
						</form>
						<center><table class="formatted">		
							<tr>
								<td><b>First</b></td>
								<td><b>Last</b></td>
								<td><b>Email</b></td>
								<td><b>Cell</b></td>
								<td><b>Dorm/House</b></td>								
							</tr>
							<tbody id="results">
							</tbody>
						</table></center>
					</div>
				</div>
			</div>
		</div>
		<? include("footer.php"); ?>
	</body>
</html>