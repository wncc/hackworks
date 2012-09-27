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
	</head>

	<body>

		<?php
			$approved_hacks = mysql_query("SELECT * FROM Urls WHERE approved = 1;");

			while($hack = mysql_fetch_array($approved_hacks))
			{
				echo "<div class=\"hack\">
					<h2 class = \"hack_name\"> Name:".$hack["name"]."</h2>
					<img src= \"".$hack["imgurl"]."\" class=\"hack_img\" width = \"100px\" height = \"100px\" >
					<p class=\"hack_desc\"> Description:".$hack["description"]." </p>
					<a href=\"".$hack["url"]."\" target=\"_blank\">Goto Hack </a>
			</div> \n\t\t";

			}

		?>

		<div id="submit_hack">

			<a href="submit_a_hack.html"> Submit a Hack </a>

		</div>


	</body>
</html>