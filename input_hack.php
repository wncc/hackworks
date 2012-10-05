<!-- php to process after user submits a hack -->

<?php

	//change according to the environment
	$connection = mysql_connect("localhost","root","");
	

	if(!$connection)
		echo "connection failed";

	$database = mysql_select_db("hackworks");

	//create one database and a table if it doesnot exist
	if(!$database){
		mysql_query("CREATE DATABASE hackworks;");

		mysql_select_db("hackworks");
		mysql_query("CREATE TABLE Urls(
			id int(11) NOT NULL auto_increment,
			approved tinyint(1) NOT NULL,
			hacker varchar(60) NOT NULL, 
			name varchar(30) NOT NULL,
			url varchar(100) NOT NULL,
			imgurl varchar(100) NOT NULL,
			description varchar(500) NOT NULL,
			PRIMARY KEY (id)	
			);");
	}
	
	//inserting into database's table #MAIN STEP
	//presently all hacks are not approved as soon as the are submitted
	$return_value = mysql_query("INSERT INTO Urls (approved, hacker, name, url, imgurl, description) 
		VALUES (0,'".$_POST["hacker"]."','".$_POST["name"]."','".$_POST["url"]."','".$_POST["imgurl"]."','".$_POST["description"]."');");
	$output;
	if(!$return_value)
		$output="Something went wrong";
	else
		$output="Added Successfully! </br> Please wait for the admin to approve";

?>

<html>
	<head>
		<title>Submission</title>
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

		<p> <?php echo $output ?></p>

		<input type="button" class="btn" onclick="window.location.href='all_hacks.php'"value="Home">
		<input type="button" class="btn" onclick="window.location.href='submit_a_hack.html'"value="Submit another Hack">


	</body>
</html>