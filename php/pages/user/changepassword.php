<?php
session_start();
if(isset($_SESSION["id"]) && isset($_SESSION["uid"]))
{
    $ID = $_SESSION["id"];
    $UID = $_SESSION["uid"];
    if(isset($_POST["oldpass"]) && isset($_POST["newpass"]) && isset($_POST["repass"]) && isset($_POST["submit"]))
    {
        $oldpass = htmlentities($_POST["oldpass"]);
        $newpass = htmlentities($_POST["newpass"]);
        $repass = htmlentities($_POST["repass"]);
        
        if($oldpass=='' && $newpass=='' && $repass=='')
        {
            echo "<script language='Javascript'>
            window.alert('Fields are empty')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpass!='' && $newpass=='' && $repass=='')
        {
            echo "<script language='Javascript'>
            window.alert('Some fields are empty')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpass=='' && $newpass!='' && $repass=='')
        {
            echo "<script language='Javascript'>
            window.alert('Some fields are empty')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpass=='' && $newpass=='' && $repass!='')
        {
            echo "<script language='Javascript'>
            window.alert('Some fields are empty')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpass!='' && $newpass=='' && $repass!='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter New Password')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpass!='' && $newpass!='' && $repass=='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter New Password Again')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpass=='' && $newpass!='' && $repass!='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter Old Password')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        
        if($newpass == $repass)
        {
            try
            {
                $connect = new mysqli("localhost", "id1549285_uc", "VTV9591104023", "id1549285_uc"); //creating the connection
                /* check connection */
                if ($connect->connect_errno)
                {
                    echo "Failed to connect to MySQL: (" . $connect->connect_errno . ") " . $connect->connect_error;
                    header('Location: ./user-home.php#setting');
                }
            }
            catch (Exception $e)
            {
              echo "Unable to connect: " . $e->getMessage();
              header('Location: ./user-home.php#setting');
            }
            
            try
            {
                function generateHash($password) {
                    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
                        $salt = '$2y$12$' . substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
                        return crypt($password, $salt);
                    }
                }
                
                function verify($password, $hashedPassword)
				{
				 return crypt($password, $hashedPassword) == $hashedPassword;
				}
                
                $sql = $connect->prepare("SELECT username,password,email FROM user WHERE UID = ? ");
                $sql->bind_param("s", $UID);
                $sql->execute();
                $sql->bind_result($username,$verifypass,$email);
                $res = $sql->fetch();
                if($res)
                {
                    $verify = verify($oldpass,$verifypass);
                    if($verify)
                    {
                        $newpassword = generateHash($newpass);
                        
                        $sql->close();
                        $sql = $connect->prepare("UPDATE user SET password = ? WHERE UID = ? ");
                        $sql->bind_param("ss", $newpassword,$UID);
                        $res1 = $sql->execute();
                        
                        if($res1)
                        {
                            /********Mail Sent to current user **************/
                            $to = $email;
                            $subject = "Universal Card Team - Account password has been changed";
                            $message = '<html>
                                        <head>
                                          <title>Account Password Changed</title>
                                        </head>
                                        <body>
                                          <h2>Universal Card Team</h2>
                                          <h3><b>As per your request,</b></h3>
                                          <h4><b>Username = '.$username.' Account Password has been changed.</b></h4>
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
                            if($retval)
                            {
                                $sql->close();
                                $connect->close();                
                                echo "<script language='Javascript'>
                                window.alert('Password Changed Successfully. Notification sent. Log In again.')
                                window.location.href='./logout.php'
                                </script>";
                            }
                            else
                            {
                                $sql->close();
                                $connect->close();                
                                echo "<script language='Javascript'>
                                window.alert('Password Changed Successfully. Notification couldnt sent. Log In again.')
                                window.location.href='./logout.php'
                                </script>";
                            }
                        }
                        else
                        {
                            $sql->close();
                            $connect->close();
                            echo "<script language='Javascript'>
                            window.alert('Password dont Change try again later.')
                            window.location.href='./user-home.php#setting'
                            </script>";
                        }
                    }
                    else
                    {
                        $sql->close();
                        $connect->close();
                        echo "<script language='Javascript'>
                        window.alert('Enter a valid old password.')
                        window.location.href='./user-home.php#setting'
                        </script>";
                    }
                }
                else
                {
                    $sql->close();
                    $connect->close();
                    echo "<script language='Javascript'>
                    window.alert('Couldnt connect.')
                    window.location.href='./user-home.php#setting'
                    </script>";
                }
            }
            catch (Exception $e)
            {
                $sql->close();
                $connect->close();
                echo "<script language='Javascript'>
                window.alert('Failed to change password: ".$e->getMessage()."')
                window.location.href='./user-home.php#setting'
                </script>";
            }
        }
        else
        {
            echo "<script language='Javascript'>
            window.alert('Password dont match')
            window.location.href='./user-home.php#setting'
            </script>";
        }
    }
    else
    {
        header('Location: ./user-home.php#setting');
    }
}
else
{
    header('Location: ../../loginpage.php');
}
?>