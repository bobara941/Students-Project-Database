<?php

//Opens a connection to the database
// Since it is a php file it won't open in a browser
// It should be saved outside of the main web document folder
// and imported when needed

/*
 * Command that gives the database user the least amount of power
09
	as is needed.
10
	GRANT INSERT, SELECT, DELETE, UPDATE ON test3.*
11
	TO 'studentweb'@'localhost'
12
	IDENTIFIED BY 'turtledove';
13
	SELECT : Select rows in tables
14
	INSERT : Insert new rows into tables
15
	UPDATE : Change data in rows
16
	DELETE : Delete existing rows (Remove privilege if not required)
 */

// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'test3');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR 
        die('Could not connect to MySQL: ' . mysqli_connect_error());