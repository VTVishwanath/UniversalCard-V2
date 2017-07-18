<?php
if(isset($_POST['Type']) && isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['Submit']))
{
	session_start();
    $type = htmlentities($_POST['Type']);
    $username = htmlentities($_POST['Username']);
    $password = htmlentities($_POST['Password']);
    $submit = htmlentities($_POST['Submit']);
    
	if(isset($_SESSION['id']) && isset($_SESSION['uid']))
	{
		header('Location: ../pages/user/user-home.php');
	}
	else if(isset($_SESSION['id']) && isset($_SESSION['rid']))
	{
		header('Location: ../pages/retailer/retailer-home.php');
	}
	else if(isset($_SESSION['id']))
	{
		header('Location: ../loginpage.php');
	}
	else
	{
		$min = 1000000000;
		$max = 9999999999;
		$_SESSION['id'] = rand ( $min , $max );

		if($username == '' && $password == '')
		{
			echo "<script language='Javascript'>
			window.alert('Fields are empty')
			window.location.href='../loginpage.php'
			</script>";
		}
		if($username != '' && $password == '')
		{
			echo "<script language='Javascript'>
			window.alert('Enter password')
			window.location.href='../loginpage.php'
			</script>";
		}
		if($username=='' && $password!='')
		{
			echo "<script language='Javascript'>
			window.alert('Enter username')
			window.location.href='../loginpage.php'
			</script>";
		}
		/*Login starts here*/
		try
		{
			$connect = new mysqli("localhost", "id1549285_uc", "VTV9591104023", "id1549285_uc"); //creating the connection
			/* check connection */
			if ($connect->connect_errno)
			{
			    echo "Failed to connect to MySQL: (" . $connect->connect_errno . ") " . $connect->connect_error;
			    header('Location: ../loginpage.php');
			}
		}
		catch (Exception $e)
		{
		  echo "Unable to connect: " . $e->getMessage();
		  header('Location: ../loginpage.php');
		}

		try
		{
			if($type == "user")
			{
				$sql = $connect->prepare("SELECT UID,status,password FROM user WHERE username = ? ");
				$sql->bind_param("s", $username);
				$sql->execute();
				$sql->bind_result($uid,$status,$pass);
				$res = $sql->fetch();
				//$sql->fetch();
				//$sql->store_result();
				//$res= $sql->get_result();

				if($res)
				{
					function verify($password, $hashedPassword)
					{
					    return crypt($password, $hashedPassword) == $hashedPassword;
					}
					$verify = verify($password,$pass);
					if($verify)
					{
						/*Checking status of the account*/
						if($status < 3)
						{
							$_SESSION['uid'] = $uid;
							$status = 0;
							$sql->close();
							$sql = $connect->prepare("UPDATE user SET status = ? WHERE UID = ?");
							$sql->bind_param("ss", $status, $uid);
							$sql->execute();
							$sql->close();
							$connect->close();

							if(!empty(htmlentities($_POST['rme'])))
							{
								setcookie("member_type",$type,time()+ (7 * 24 * 60 * 60));
								setcookie ("member_username",$username,time()+ (7 * 24 * 60 * 60));
								setcookie ("member_password",$password,time()+ (7 * 24 * 60 * 60));
							}
							else
							{
								if(isset($_COOKIE["member_type"])) {
									setcookie ("member_type","");
								}
								if(isset($_COOKIE["member_username"])) {
									setcookie ("member_username","");
								}
								if(isset($_COOKIE["member_password"])) {
									setcookie ("member_password","");
								}
							}
							
							header('Location: ../pages/user/user-home.php');
						}
						else
						{	
							$sql->close();
							$connect->close();
							if(isset($_SESSION['id']))
							{
								session_unset(); // remove all session variables 
								session_destroy(); // destroy the session
							}
							echo "<script language='Javascript'>
							window.alert('Account is blocked contact Administrator')
							window.location.href='../loginpage.php'
							</script>";
						}
						/******************/
					}
					else
					{
						$status = $status + 1;
						$sql->close();
						$sql = $connect->prepare("UPDATE user SET status = ? WHERE UID = ?");
						$sql->bind_param("ss", $status, $uid);
						$sql->execute();
						$sql->close();
						$connect->close();
						if(isset($_SESSION['id']))
						{
							session_unset(); // remove all session variables 
							session_destroy(); // destroy the session
						}
						echo "<script language='Javascript'>
						window.alert('Incorrect Password.')
						window.location.href='../loginpage.php'
						</script>";
					}
				}
				else
				{ 
					$sql->close();
					$connect->close();
					if(isset($_SESSION['id']))
					{
						session_unset(); // remove all session variables 
						session_destroy(); // destroy the session
					}
					echo "<script language='Javascript'>
					window.alert('Username or Password incorrect')
					window.location.href='../loginpage.php'
					</script>";
				}
			}
			else if($type == "retailer")
			{
				$sql = $connect->prepare("SELECT RID,status,password FROM retailer WHERE username = ? ");
				$sql->bind_param("s", $username);
				$sql->execute();
				$sql->bind_result($rid,$status,$pass);
				$res = $sql->fetch();

				if($res)
				{
					function verify($password, $hashedPassword) {
					    return crypt($password, $hashedPassword) == $hashedPassword;
					}
					$verify = verify($password,$pass);
					if($verify)
					{
						/*Checking status of the account*/
						if($status < 3)
						{
							$_SESSION['rid'] = $rid;
							$status = 0;
							$sql->close();
							$sql = $connect->prepare("UPDATE retailer SET status = ? WHERE RID = ?");
							$sql->bind_param("ss", $status, $rid);
							$sql->execute();
							$sql->close();
							$connect->close();

							if(!empty(htmlentities($_POST['rme'])))
							{
								setcookie("member_type",$type,time()+ (7 * 24 * 60 * 60));
								setcookie ("member_username",$username,time()+ (7 * 24 * 60 * 60));
								setcookie ("member_password",$password,time()+ (7 * 24 * 60 * 60));
							}
							else
							{
								if(isset($_COOKIE["member_type"])) {
									setcookie ("member_type","");
								}
								if(isset($_COOKIE["member_username"])) {
									setcookie ("member_username","");
								}
								if(isset($_COOKIE["member_password"])) {
									setcookie ("member_password","");
								}
							}

							header('Location: ../pages/retailer/retailer-home.php');
						}
						else
						{	
							$sql->close();
							$connect->close();
							if(isset($_SESSION['id']))
							{
								session_unset(); // remove all session variables 
								session_destroy(); // destroy the session
							}
							echo "<script language='Javascript'>
							window.alert('Account is blocked contact Administrator')
							window.location.href='../loginpage.php'
							</script>";
						}
						/******************/
					}
					else
					{
						$status = $status + 1;
						$sql->close();
						$sql = $connect->prepare("UPDATE retailer SET status = ? WHERE RID = ?");
						$sql->bind_param("ss", $status, $rid);
						$sql->execute();
						$sql->close();
						$connect->close();
						if(isset($_SESSION['id']))
						{
							session_unset(); // remove all session variables 
							session_destroy(); // destroy the session
						}
						echo "<script language='Javascript'>
						window.alert('Incorrect Password.')
						window.location.href='../loginpage.php'
						</script>";
					}
				}
				else
				{ 
					$sql->close();
					$connect->close();
					if(isset($_SESSION['id']))
					{
						session_unset(); // remove all session variables 
						session_destroy(); // destroy the session
					}
					echo "<script language='Javascript'>
					window.alert('Username or Password incorrect')
					window.location.href='../loginpage.php'
					</script>";
				}
			}
			else
			{
				header('Location: ../loginpage.php');
			}
		}
		catch (Exception $e)
		{
			$sql->close();
			$connect->close();
			echo "Failed to login: " . $e->getMessage();
		  	header('Location: ../loginpage.php');
		}
		/*Login ends here*/
	}
}
else
{
	header('Location: ../loginpage.php');
}
?>
