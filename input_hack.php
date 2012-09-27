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
			name varchar(30) NOT NULL,
			url varchar(100) NOT NULL,
			imgurl varchar(100) NOT NULL,
			description varchar(500) NOT NULL,
			PRIMARY KEY (id)	
			);");
	}
	
	//inserting into database's table #MAIN STEP
	//presently all hacks are approved as soon as the are submitted
	$return_value = mysql_query("INSERT INTO Urls (approved, name, url, imgurl, description) 
		VALUES (1,'".$_POST["name"]."','".$_POST["url"]."','".$_POST["imgurl"]."','".$_POST["description"]."');");

	if(!$return_value)
		echo "Something went wrong";
	else
		echo "Added Successfully!";

?>

<html>
	<head>
		<title>Submission</title>
	</head>

	<body>

		<a href="submit_a_hack.html"> Submit another hack </a> </br>

		<a href="all_hacks.php"> View all Hacks </a>


	</body>
</html>