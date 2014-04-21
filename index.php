<?
// require common code
require_once("includes/common.php"); 

$id = $_SESSION["id"];


?>
<!DOCTYPE html>
<html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link href="styles.css" rel="stylesheet" type="text/css">
        <title>AADT: Harvard Asian-American Dance Troupe</title>
    </head>
    <body id="index">
    	<div id="wrapper">
			<? include("nav.php"); ?>
    		<div class="center" id="transparent">
    		</div>
    		<div class="center">
				<img src="images/aadt_logo.png" />
				<p>Welcome to the website of the Harvard Asian American Dance Troupe (AADT), a student-run organization at Harvard College! Please join us as we explore the world of Asian culture and dance.</p>
	<h2><b>Join AADT 2014!</b> | April 21, 2014 </h2><br/>
	<iframe width="550" height="315" src="http://www.youtube.com/embed/mDLDJMJi05c" frameborder="0" allowfullscreen></iframe>
	
	<h2><b>Eastbound 2014 Videos!!!</b> | April 21, 2014 </h2><br>
	<iframe width="560" height="315" src="//www.youtube.com/embed/tXZLF_xqvaQ?list=PLadDdfXlfSo3Pk2nKGXJvk50RnXATlwIn" frameborder="0" allowfullscreen></iframe>

	<h2><b>Join AADT This Fall!</b> | June 9, 2013</h2><br><br>
	<iframe width="550" height="315" src="http://www.youtube.com/embed/KWXHEK3pIuE" frameborder="0" allowfullscreen></iframe>
	<p>
		Top 5 Reasons why you should join AADT:
		<ol>
			<li> AADT is the ONLY non-audition dance troupe on campus. ALL are welcome.</li>
			<li> AADT offers a wide variety of student choreographed dances from traditional to hip hop to contemporary to fusion (and much more).</li>
			<li> AADT is a family of 100+ dancers. Make amazing friendships that will last all 4 years during your time at Harvard!</li>
			<li> Our annual spring show is always sold out and a LOT of fun!</li>
			<li> Dancing is a great way to have fun while exercising and staying in shape - fight off the Freshman 15!</li>
		</ol>
	</p>
	<p>*Although the video above says Dear Class of 2017, we welcome undergraduate and graduate students from all class years to join our troupe as new members!</p>

	<? 
		$news = mysql_query("SELECT * FROM `news` WHERE type = 'Home' ORDER by date DESC LIMIT 1");
		while($newsrow= mysql_fetch_array($news))
		{
			print('<h2><b>' . $newsrow["title"] . "</b> | " . date("F d, Y",$newsrow["date"]) . '</h2>');
			print('<p>' . $newsrow["text"] . '</p>');
			print('<br>');			
		}
	?>
						<h4>American Bullion</h4>
			<p>Working within a large dance production company is about a lot more than just performances. Many of the largest productions are run like fortune 500 companies and are required to provide benefits and compensation for their full time employees. Don't be surprised to find dancers with a 401K and a <a href="http://www.americanbullion.com/gold-ira">gold IRA</a> in their retirement plan.</p>		
			<h4>Organic Mattresses for Dancers</h4>
			<p>After a long day in the dance studio it can be nice to come back to your house to relax and unwind. Make sure your lounging area is comfortable with an <a href="http://www.lifekind.com">organic mattress</a> and down comforter. Getting a good night's rest is a good way to be prepared for the next day's tasks.</p>
			<h4>Find Employment with Executive Job Searches</h4>
			<p>Dancing is a sport and hobby that is fundamental in just about every culture in the world. As such, it can be a great extra-curricular activity to have on your resume. Some of the top <a href="https://www.bluesteps.com">executive search</a> firms look for people who have a well-rounded background rather than people who are specialized to a specific skill.</p>
			</div>
			    		
		</div>
    	<? include("footer.php"); ?>
    </body>
</html>
