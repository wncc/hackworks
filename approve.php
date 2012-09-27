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

<?php
	
	$i=1;
	//echo sizeof($_POST);
	$curr_id;
	foreach($_POST as $k=>$v)
	{
		if(strpos($k,"stat") > 0){
			echo $_POST[$k]." ";
			$curr_id  = substr($k,5);
			echo $curr_id." ;";
			if($_POST[$k] == "approve")
				mysql_query("UPDATE Urls SET approved = 1 WHERE id = ".$curr_id.";");
			else if($_POST[$k] == "no_approve")
				mysql_query("UPDATE Urls SET approved = 0 WHERE id = ".$curr_id.";");	
			elseif ($_POST[$k] == "delete") {
				mysql_query("DELETE FROM Urls WHERE id = ".$curr_id.";");
			}


		}

	}

	echo "  Update successful";
?>
<html>

	<head>
		<title> Update Hacks</title>
	</head>

	<body>

		<a href="all_hacks.php"> Show all hacks</a>

	</body>
</html>