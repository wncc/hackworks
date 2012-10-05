<!-- This page is to display all the hacks -->

<?php

	//change according to the environment
	$connection = mysql_connect("localhost","root","");
	
	if(!$connection)
		echo "connection to database failed";

	$database = mysql_select_db("hackworks");
?>

<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="display_hacks.css">
		<link rel="stylesheet" type="text/css" href="topbar.css">
	</head>

	<body>
		<div id="top_fake"></div>
		<div id="topbar">
			<span id = "title"> Hack Works </span>
			<input type="button" class="btn btn-large btn-primary" onclick="window.location.href='all_hacks.php'"value="Home">
			<input type="button" class="btn btn-large btn-success" onclick="window.location.href='submit_a_hack.html'"value="Submit a Hack">
			<input type="button" class="btn btn-large btn-danger" onclick="window.location.href='admin_interface.html'"value="Admin">
		</div>


		<?php
			$approved_hacks = mysql_query("SELECT * FROM Urls WHERE approved = 1;");

			while($hack = mysql_fetch_array($approved_hacks))
			{
				echo "<div class=\"hack well well-small\" >
					<img src= \"".$hack["imgurl"]."\" class=\"hack_img\" width = \"100px\" height = \"100px\" >
					<h2 class = \"hack_name\"> ".$hack["name"]."</h2>
					<p class=\"hack_desc well well-small\"> ".$hack["description"]." </p>
					<input type=\"button\" class=\"btn btn-primary hack_link\" onclick=\"window.location.href='".$hack["url"]."'\"value=\"Goto Hack\">
					<div class=\"well well-small hacker_name\"> By:".$hack["hacker"]."</div>
			</div> \n\t\t";

			}

		?>




	</body>
</html>