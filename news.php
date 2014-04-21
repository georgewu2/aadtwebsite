<?
// require common code
require_once("includes/common.php"); 

if (isset($_POST["action"]))
{
	if(empty($_POST["type"]))
		$error = true;
	$selected = $_POST["type"];
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<link href="styles.css" rel="stylesheet" type="text/css">
  	<title>AADT: Harvard Asian-American Dance Troupe</title>
  </head>
  <script type="text/javascript">	

	// adapted from: http://davidwalsh.name/animated-ajax-jquery

	// allows admins and choreographers to dynamically delete posts  
	$(document).ready(function() {
  	$('a.delete').click(function(e) {
    	e.preventDefault();
    	var parent = $(this).parent();
    $.ajax({
    	// send get request 
      type: 'get',
      url: 'delete.php',
      data: {delete: parent.attr('id').replace('record-','')},
      success: function() {
        parent.slideUp(300,function() {
          parent.remove();
        });
      }
		});
  	});
	});
      
	</script>
  <body id="users">
		<div id="wrapper"style="width:100%;">
  		<? include("nav.php"); ?>
			<div class="center3" id="transparent"></div>
  		<div class="center3">
				<? include("sidebar.php"); ?>
				<div id="content">
					<p><form action="news.php" method="post">
						<select id="type" name="type">
							<option value="">Choose a Dance!</option>
							<option value="All">To All Members</option>
							<?
								$users_dances = mysql_query("SELECT * FROM dances WHERE id = '$id'");
								while ($dance_row = mysql_fetch_array($users_dances))
								{
									print('<option value="' . $dance_row["dance"]. '">' . $dance_row["dance"] . '</option>');
								}
							?>
					</select>
					<input name="action" type="submit" value="Display">
					</form></p>
					<? if($error): ?>
						<span style="color: red;">Please choose a dance!</span>
					<? endif ?>
					<?
						if(isset($_POST["action"]) && !$error)
						{
							print('<h1>' . $selected);
							if($selected != "All")
								print(' Dance');
							print('</h1>');
							
							// search for news that corresponds to dance selected by user
							$news = mysql_query("SELECT * FROM `news` WHERE type = '$selected' ORDER by date DESC");
							while($newsrow= mysql_fetch_array($news))
							{
								$selected_dance = mysql_query("SELECT * FROM dances WHERE (id = '$id' AND dance = '$selected')");
								$selected_dance_row = mysql_fetch_array($selected_dance);	
								
								print('<div style="width:90%" id="record-' . $newsrow["date"] . '">');
								// if user is the choregrapher or an admin, allow option to delete posts
								if ($selected_dance_row["choreo"] == true || $admin == true)
									print('<a href="?delete=' . $newsrow['date'] . '" style="float:right;" class="delete">[ x ]</a>');
								print('<h2><b>' . $newsrow["title"] . "</b> | " . date("F d, Y @ g:i a",$newsrow["date"]) . "</h2>");
								print('<p>' . $newsrow["text"] . '</p>');
								
								// if a video was submitted with post, embed it 
								if($newsrow["video"])
								{
									print('<object style="height: 475px; width: 250px">');
									print('<param name="movie" value="' . $newsrow["video"] . '">');
									print('<param name="allowFullScreen" value="true">');
									print('<param name="allowScriptAccess" value="always">');
									print('<embed src="'. $newsrow["video"] . '" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="500" height="300"></object>');
								}
								print('<br><br></div>');
							}
							if(mysql_num_rows($news) == 0)
								print('(none right now)');
						}
					?>
				</div>
			</div>
		</div>
		<? include("footer.php"); ?>
		</body>
</html>
