<?php
	
	$dbhost = 'localhost';
	$dbuser= 'root';
	$dbpass = '';
	$dbname ='group';

	$connection = mysqli_connect('localhost','root','','group');

	if (mysqli_connect_errno()){
		die('Database connection failed' . mysqli_connect_error());
	}
	?>