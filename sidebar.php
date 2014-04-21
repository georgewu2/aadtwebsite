<!-- Side navigation for logged in users-->
<div id="sidebar">
  <h2>Hi ﻿<?= $userrow["first"] ?>!</h2>
	<ul>
  		<li><a href="home.php">Home</a></li>
  	</ul>
  <? if($userrow["username"] == "aadt"): ?>
  <h2>Superadmin Access</h2>
  	<ul>
  		<li><a href="admin.php">Change</a></li>
	</ul>
  <? endif ?>
  <? if($admin): ?>
  <h2>Admin Access</h2>
  	<ul>
  		<li><a href="addrem.php">Add/Remove Dancers</a></li>
			<li><a href="search_members.php">Search for Dancers</a></li>
  		<li><a href="inventory.php">Inventory</a></li> 
			<li><a href="newsupdate.php">Post News</a></li>
	</ul>
  <? endif ?>
  <? if($choreo): ?>
  <h2>Choreographer Access</h2>
  	<ul>
  		<li><a href="dancers.php">View Dancer Contacts</a></li>
			<li><a href="search.php">Search Inventory</a></li> 
			<li><a href="newsupdate.php">Post News</a></li>
	</ul>
  <? endif ?>
  <h2>Member Access</h2>
  	<ul>
  		<li><a href="news.php">View News</a></li>		
  		<li><a href="rehearsals.php">View Rehearsals</a></li>	  		
		<li><a href="logout.php">Logout</a></li>  		
	</ul>
</div>