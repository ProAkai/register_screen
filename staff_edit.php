<DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> Title you want </title>
</head>
<body>

<?php
	
try
{
	
	$staff_code=$_POST['staffcode'];
	
	$dsn = 'mysql:dbname=test;host=localhost';
	$user = 'root';
	$password = 'password';
	$dbh = new PDO($dsn, $user, $password);
	$dbh ->query('SET NAMES utf8');
	
	$sql = 'SELECT name FROM mst_staff WHERE code=?';
	$stmt = $dbh-> prepare($sql);
	$data[]= $staff_code;
	$stmt-> execute($data);
	
	$rec = $stmt-> fetch(PDO::FETCH_ASSOC);
	$staff_name = $rec['name'];
	
	$dbh = null;
	
}
catch(Exception $e)
{
	print'Sorry, now there is a problem in the system.';
	exit();
}

?>

Staff Information Change <br />
<br />
Staff Code <br />
<?php print $staff_code; ?>
<br />
<br />
<form method="post" action ="staff_edit_check.php">
<input type="hidden" name="code" value="<?php print $staff_code; ?>">
Staff Name <br />
<input type = "text" name= "name" style = "width:200px" value= "<?php print $staff_name;?>"> <br />
Input your password. <br />
<input type = "password" name = "pass" style= "width:100px"> <br />
Input your password again. <br />
<input type ="password" name = "pass2" style= "width:100px"> <br />
<br />
<input type = "button" onclick = "history.back()" value = "Back">
<input type ="submit" value ="OK">
</form>

</body>
</html>
