<?php
	
	$connection = mysqli_connect('localhost','root','');
	if(!$connection)
		die("Database connection Failed".mysqli_error($connection));
	$select_db = mysqli_select_db($connection,'groove');
	if(!$select_db)
		die("Database connection Failed".mysqli_error($select_db));
?>