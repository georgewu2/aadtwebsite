<?
	// require common code
	require_once("includes/common.php");
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

	// allows admins and choreographers to dynamically delete posts  
	$(document).ready(function() {
  	$('a.delete').click(function(e) {
    	e.preventDefault();
    	var parent = $(this).parent();
    $.ajax({
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
					<h1>Welcome!</h1>
					<p>Welcome to the AADT members portal!</p>
					<h1>Recent News</h1>
					<?
	  				$user_dances = mysql_query("SELECT * FROM dances WHERE id = '$id'");

						// prepare SQL string that lists all user's dances
						while ($user_dance = mysql_fetch_array($user_dances))
							$all_user_dances = $all_user_dances . " OR type='" . $user_dance["dance"] . "'";
						
						// select 5 most recent posts relevant to current user
						$select_news = "SELECT * FROM `news` WHERE (type = 'All'" . $all_user_dances . ") ORDER by date DESC LIMIT 5";
						$news = mysql_query($select_news);
						
						// display each of these posts
						while($newsrow= mysql_fetch_array($news))
						{
							print('<div style="width:90%" id="record-' . $newsrow["date"] . '">'); 
						
						// determine whether user is a choregrapher for the dance related to this post
 						$current_dance = $newsrow["type"];
 						$sql = "SELECT * FROM dances WHERE (id = '$id' AND dance = '$current_dance')";
						$select_current_dance = mysql_query($sql);
						$determine_choreo = mysql_fetch_array($select_current_dance);

							// if the user is an administrator or choreographer, allow option to delete post
							if ($determine_choreo["choreo"] || $admin)
									print('<a href="?delete=' . $newsrow['date'] . '" style="float:right;" class="delete">[ x ]</a>');
							print('<h2><b>' . '(' . $newsrow["type"] . ') ' . $newsrow["title"] . '</b> | ');
							print(date("F d, Y @ g:i a",$newsrow["date"]) . '</h2>');
							print('<p>' . $newsrow["text"] . '</p>');
							
							// if the news entry countains youtube link, embed video
							if($newsrow["video"])
							{
								print('<object style="height: 500px; width: 300px">');
								print('<param name="movie" value="' . $newsrow["video"] . '">');
								print('<param name="allowFullScreen" value="true">');
								print('<param name="allowScriptAccess" value="always">');
								print('<embed src="'. $newsrow["video"] . '" type="application/x-shockwave-flash"');
								print('allowfullscreen="true" allowScriptAccess="always" width="500" height="300"></object>');
							}
							print('<br><br></div>');
						}
						
						// let users know if no news is available
						if(mysql_num_rows($news) == 0)
						print('(none right now)');
					?>
				</div>
			</div>
		</div>
		<? include("footer.php"); ?>
		</body>
</html>
