<?php
session_start();
if(isset($_SESSION["adminid"])){
	echo "<script language='Javascript'>
		location.href = '../html/adminhome.php'
		</script>";
}
else {

if(isset($_POST['Username']) && isset($_POST['Password'])){

$username = $_POST['Username'];
$password = $_POST['Password'];

if($username=='' && $password=='')
{
	echo "<script language='Javascript'>
	window.alert('Fields are empty')
	window.location.href='../index.php'
	</script>";
}
if($username!='' && $password=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter password')
	window.location.href='../index.php'
	</script>";
}
if($username=='' && $password!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter username')
	window.location.href='../index.php'
	</script>";
}

$connect= mysqli_connect('localhost', 'id1549285_uc', 'VTV9591104023', 'id1549285_uc') or die("Couldn't connect to database");

$sql = "SELECT AID,password FROM administrator WHERE username ='$username'";

$result=$connect->query($sql);
if($result-> num_rows>0){
	while($row=$result->fetch_assoc()){
				$ses = $row['AID'];
				$out = $row['password'];
	}
	function verify($password, $hashedPassword) {
	    return crypt($password, $hashedPassword) == $hashedPassword;
	}
	$verify = verify($password, $out);
	if($verify) {
		$_SESSION["adminid"] = $ses;
		echo "<script language='Javascript'>
		location.href = '../html/adminhome.php?home'
		</script>";
	}
	else{
		echo "<script language='Javascript'>
		window.alert('Password is incorrect')
		window.location.href='../index.php'
		</script>";
	}
}else{
	echo "<script language='Javascript'>
	window.alert('Username or Password incorrect')
	window.location.href='../index.php'
	</script>";
}

}else{
	echo "<script language='Javascript'>
	location.href='../index.php'
	</script>";
}

}
?>
