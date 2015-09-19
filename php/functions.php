<?php

require_once 'connectdb.php';

function query_database($connection, $query)
{
	$result = mysqli_query($connection, $query);
	if(!$result)
	{
		die("Database query failed: " . mysqli_error($connection));
	}
	else
	{
		return $result;
	}
} 


?>