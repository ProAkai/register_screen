<DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> input title you want </title>
</head>
<body>

<?php

$staff_name=$_POST['name'];
$staff_pass=$_POST['pass'];
$staff_pass2=$_POST['pass2'];

$staff_name= htmlspecialchars($staff_name);
$staff_pass= htmlspecialchars($staff_pass);
$staff_pass2= htmlspecialchars($staff_pass2);

if($staff_name=='')
{
	print 'You missed to input staff name. <br />';
}	
else
{
	print 'staff name:';
	print $staff_name;
	print '<br />';		
}	
	
	If($staff_pass=='')
{
	print 'You missed to input password. <br />';
}	

if($staff_pass!=$staff_pass2)
{
	print 'Password is incorrect <br />';
}
	
if($staff_name==''|| $staff_pass==''|| $staff_pass!=$staff_pass2)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="Back">';
	print '</form>';
}
else
{
	$staff_pass=md5($staff_pass);
	print '<form method="post" action="staff_add_done.php">';
	print '<input type="hidden" name="name" value="'.$staff_name.'">';
	print '<input type="hidden" name="pass" value="'.$staff_pass.'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="Back">';
	print '<input type="submit" value="OK">';
	print '</form>';
}	
	
?>

</body>
</html>
