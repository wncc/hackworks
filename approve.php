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
			//echo $_POST[$k]." ";
			$curr_id  = substr($k,5);
			//echo $curr_id." ;";
			if($_POST[$k] == "approve")
				mysql_query("UPDATE Urls SET approved = 1 WHERE id = ".$curr_id.";");
			else if($_POST[$k] == "no_approve")
				mysql_query("UPDATE Urls SET approved = 0 WHERE id = ".$curr_id.";");	
			elseif ($_POST[$k] == "delete") {
				mysql_query("DELETE FROM Urls WHERE id = ".$curr_id.";");
			}


		}

	}

	//echo "  Update successful";
?>
<html>

	<head>
		<title> Update Hacks</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
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
		<h1> Update successful </h1>

	</body>
</html>