<DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> input title you want </title>
</head>
<body>

<?php

try
{

	$dsn = 'mysql:dbname=test;host=localhost';
	$user = 'root';
	$password = 'password';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8');
	
	$sql = 'SELECT code,name FROM mst_staff WHERE 1';
	$stmt = $dbh->prepare($sql);
	$stmt -> execute();
	
	$dbh = null;
	
	print 'Staff Members <br /> <br />';
	
	print '<form method = "post" action="staff_edit.php">';
	while(true)
	{
		$rec = $stmt-> fetch(PDO::FETCH_ASSOC);
		if($rec==false)
		{
			break;
		}
		print'<input type ="radio" name = "staffcode" value ="'.$rec['code'].'">';
		print $rec['name'];
		print '</br>';
	}
	print '<input type="submit" value="correction">';
	print '</form>';
	
}
catch (Exception $e)
{
	print 'Sorry, now we have a trouble of system.';
		exit();
}

?>


</body>
</html>
