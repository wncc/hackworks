<?php
	if($_POST["password"] != "christtheredeemer*123#"){

		echo "Wrong password!";

		die ;
	}
		

?>



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

		<form method="post" action="approve.php">
			<?php
				$approved_hacks = mysql_query("SELECT * FROM Urls ;");
				$approved;
				$id;
				$not_approved;

				while($hack = mysql_fetch_array($approved_hacks))
				{
					$id=$hack["id"];
					if($hack["approved"]){
							$approved = "checked=true";
							$not_approved = "";
					}
					else{
							$not_approved = "checked=true";
							$approved = "";
					}
					echo "<div class=\"hack well well-small\">
						<img src= \"".$hack["imgurl"]."\" class=\"hack_img\" width = \"100px\" height = \"100px\" >
						<h2 class = \"hack_name\"> ".$hack["name"]."</h2>
						<p class=\"hack_desc well well-small\"> ".$hack["description"]." </p>
						<input type=\"button\" class=\"btn btn-primary hack_link\" onclick=\"window.location.href='".$hack["url"]."'\"value=\"Goto Hack\">
						<div class=\"well well-small hacker_name\"> By:".$hack["hacker"]."</div> </br> </br>
						<input type=\"radio\" name=\"hstat".$id."\" value=\"approve\" ".$approved."> Approve 
						<input type=\"radio\" name=\"hstat".$id."\" value=\"no_approve\" ".$not_approved."> Don't Approve
						<input type=\"radio\" name=\"hstat".$id."\" value=\"delete\"> Delete </br>
				</div> \n\t\t";
				}

			?>
			<div id="update" style="position:fixed; top: 60px; left: 20px; z-index: 2;">
				<input type="password" name="password">
				<input type="submit" class="btn " value="Update Hacks">
			</div>
		</form>



	</body>
</html>