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
	
	$staff_name=$_POST['name'];
	$staff_pass=$_POST['pass'];
	
	$staff_name=htmlspecialchars($staff_name);
	$staff_pass=htmlspecialchars($staff_pass);
	
	$dsn='mysql:dbname=test;host=localhost';
	$user='root';
	$password='password';
	$dbh=new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');
	
	$sql='INSERT INTO mst_staff(name,password) VALUES (?,?)';
	$stmt=$dbh->prepare($sql);
	$data[]=$staff_name;
	$data[]=$staff_pass;
	$stmt->execute($data);
	
	$dbh=null;
	
	print 'Added  ';
	print $staff_name;
		
}
catch(Exception $e)
{
	print 'Sorry. Now our server is busy. Please try in a few minutes later.';
	exit();
}	
	
?>

<a href="staff_list.php"> Back</a>

</body>
</html>
