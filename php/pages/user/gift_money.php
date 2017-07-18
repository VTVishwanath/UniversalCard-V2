<?php
session_start();
if(isset($_SESSION["id"]) && isset($_SESSION["uid"]))
{
    $ID = $_SESSION["id"];
    $UID = $_SESSION["uid"];
    if(isset($_POST["phone"]) && isset($_POST["amount"]) && isset($_POST["pin"]) && isset($_POST["submit"]))
    {
        $phone = $_POST["phone"];
        $amount = $_POST["amount"];
        $pin = $_POST["pin"];
        
        if($phone=='' && $amount=='' && $pin=='')
        {
            echo "<script language='Javascript'>
            window.alert('Fields are empty')
            window.location.href='./user-home.php#gift'
            </script>";
        }
        if($phone!='' && $amount=='' && $pin=='')
        {
            echo "<script language='Javascript'>
            window.alert('Some fields are empty')
            window.location.href='./user-home.php#gift'
            </script>";
        }
        if($phone=='' && $amount!='' && $pin=='')
        {
            echo "<script language='Javascript'>
            window.alert('Some fields are empty')
            window.location.href='./user-home.php#gift'
            </script>";
        }
        if($phone=='' && $amount=='' && $pin!='')
        {
            echo "<script language='Javascript'>
            window.alert('Some fields are empty')
            window.location.href='./user-home.php#gift'
            </script>";
        }
        if($phone!='' && $amount=='' && $pin!='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter amount to transfer')
            window.location.href='./user-home.php#gift'
            </script>";
        }
        if($phone!='' && $amount!='' && $pin=='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter PIN')
            window.location.href='./user-home.php#gift'
            </script>";
        }
        if($phone=='' && $amount!='' && $pin!='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter phone number')
            window.location.href='./user-home.php#gift'
            </script>";
        }
        
        try
		{
			$connect = new mysqli("localhost", "id1549285_uc", "VTV9591104023", "id1549285_uc"); //creating the connection
			/* check connection */
			if ($connect->connect_errno)
			{
			    echo "Failed to connect to MySQL: (" . $connect->connect_errno . ") " . $connect->connect_error;
			    header('Location: ./user-home.php#gift');
			}
		}
		catch (Exception $e)
		{
		  echo "Unable to connect: " . $e->getMessage();
		  header('Location: ./user-home.php#gift');
		}
        
        try
        {
            $sql = $connect->prepare("SELECT username,phone,email,balance,PIN FROM user WHERE UID = ? ");
            $sql->bind_param("s", $UID);
            $sql->execute();
            $sql->bind_result($username,$pnum,$email,$balance,$userpin);
            $res = $sql->fetch();

            if($res)
            {
                if($phone == $pnum)
                {
                    $sql->close();
                    $connect->close();
                    echo "<script language='Javascript'>
                    window.alert('Enter other users phone number not yours')
                    window.location.href='./user-home.php#gift'
                    </script>";
                }
                else
                {
                    if($pin != $userpin)
                    {
                        $sql->close();
                        $connect->close();
                        echo "<script language='Javascript'>
                        window.alert('Enter correct PIN')
                        window.location.href='./user-home.php#gift'
                        </script>";
                    }
                    else
                    {
                        if($balance < $amount)
                        {
                            $sql->close();
                            $connect->close();
                            echo "<script language='Javascript'>
                            window.alert('Insufficient Balance to transfer')
                            window.location.href='./user-home.php#gift'
                            </script>";
                        }
                        else
                        {
                            $sql->close();
                            $sql = $connect->prepare("SELECT UID,username,email FROM user WHERE phone = ? ");
                            $sql->bind_param("s", $phone);
                            $sql->execute();
                            $sql->bind_result($tuid,$tusername,$temail);
                            $res1 = $sql->fetch();

                            if($res1)
                            {
                                $sql->close();
                                $sql = $connect->prepare("UPDATE user SET balance = balance - ? WHERE UID = ? ");
                                $sql->bind_param("ss",$amount,$UID);
                                $sql->execute();
                                $sql->close();
                                $sql = $connect->prepare("UPDATE user SET balance = balance + ? WHERE UID = ? ");
                                $sql->bind_param("ss",$amount,$tuid);
                                $sql->execute();

                                /********Mail Sent to current user **************/
                                $to = $email;
                                $subject = "Universal Card Team - Transaction Successful";
                                $message = '<html>
                                            <head>
                                              <title>Transaction Successful</title>
                                            </head>
                                            <body>
                                              <h2>Universal Card Team</h2>
                                              <h3><b>As per your request,</b></h3>
                                              <h4><b>We Successfully Transferred Rs '.$amount.' eMoney to - '.$tusername.' with Phone number - '.$phone.'</b></h4>
                                              <p><i>If this action is not done by you then Contact Universal Card Support team.universalcard@gmail.com </i></p>
                                              <p>Thank you for using Universal Card</p>
                                            </body>
                                            </html>';
                                $headers  = 'MIME-Version: 1.0' . "\r\n";
                                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";    #<= add this for to get a plain text
                                #Content-type: text/html for html file to be send or Content-type: text/plain for normal text
                                $headers .= "To: ".$to." \r\n";
                                $headers .= "From: team.universalcard@gmail.com \r\n";
                                $headers .= "Do not Replay for this mail as it is auto generated. \r\n";
                                $retval = mail ($to,$subject,$message,$headers);
                                /*********************************************/

                                /********Mail sent to Other user **************/
                                $to1 = $temail;
                                $subject1 = "Universal Card Team - You received eMoney ".$amount." from ".$username." ";
                                $message1 = '<html>
                                            <head>
                                              <title>You received eMoney '.$amount.' from '.$username.' </title>
                                            </head>
                                            <body>
                                              <h2>Universal Card Team</h2>
                                              <h4><b>'.$username.' Sent Rs '.$amount.' eMoney to you. With his Phone number - '.$pnum.'</b></h4>
                                              <p>Thank you.</p>
                                            </body>
                                            </html>';
                                $headers1  = 'MIME-Version: 1.0' . "\r\n";
                                $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";    #<= add this for to get a plain text
                                #Content-type: text/html for html file to be send or Content-type: text/plain for normal text
                                $headers1 .= "To: ".$to." \r\n";
                                $headers1 .= "From: team.universalcard@gmail.com \r\n";
                                $headers1 .= "Do not Replay for this mail as it is auto generated. \r\n";
                                $retval1 = mail ($to1,$subject1,$message1,$headers1);
                                /*********************************************/
                                
                                if($retval == true && $retval1 == true)
                                {
                                    $sql->close();
                                    $connect->close();
                                    echo "<script language='Javascript'>
                                    window.alert('Successfully Transferred and Notification sent.')
                                    window.location.href='./user-home.php#gift'
                                    </script>";
                                }
                                else
                                {
                                    $sql->close();
                                    $connect->close();
                                    echo "<script language='Javascript'>
                                    window.alert('Successfully Transferred. Notification couldnt sent.')
                                    window.location.href='./user-home.php#gift'
                                    </script>";
                                }
                                
                            }
                            else
                            {
                                $sql->close();
                                $connect->close();
                                echo "<script language='Javascript'>
                                window.alert('Enter a valid registered phone number')
                                window.location.href='./user-home.php#gift'
                                </script>";
                            }
                        }
                    }
                }
            }
            else
            {   
                $sql->close();
                $connect->close();
                echo "Unable to connect";
                header('Location: ./user-home.php#gift');
            }
        }
        catch (Exception $e)
		{
			$sql->close();
			$connect->close();
			echo "Failed to transfer: " . $e->getMessage();
            header('Location: ./user-home.php#gift');
		}
    }
    else
    {
        header('Location: ./user-home.php#gift');
    }
}
else
{
    header('Location: ../../loginpage.php');
}
?>