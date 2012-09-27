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
	</head>

	<body>

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
					echo "<div class=\"hack\">
						<h2 class = \"hack_name\"> Name:".$hack["name"]."</h2>
						<img src= \"".$hack["imgurl"]."\" class=\"hack_img\" width = \"100px\" height = \"100px\" >
						<p class=\"hack_desc\"> Description:".$hack["description"]." </p>
						<a href=\"".$hack["url"]."\" target=\"_blank\">Goto Hack </a> </br>
						<input type=\"radio\" name=\"hstat".$id."\" value=\"approve\" ".$approved."> Approve </br>
						<input type=\"radio\" name=\"hstat".$id."\" value=\"no_approve\" ".$not_approved."> Don't Approve</br>
						<input type=\"radio\" name=\"hstat".$id."\" value=\"delete\"> Delete </br>


				</div> \n\t\t";
				}

			?>
			</br>
			Password: <input type="password" name="password">
			<input type="submit" value="Update Hacks">

		</form>



	</body>
</html>