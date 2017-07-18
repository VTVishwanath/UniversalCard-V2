<?php
session_start();
if(isset($_SESSION["id"]) && isset($_SESSION["uid"]))
{
    $ID = $_SESSION["id"];
    $UID = $_SESSION["uid"];
    if(isset($_POST["oldpin"]) && isset($_POST["newpin"]) && isset($_POST["repin"]) && isset($_POST["submit"]))
    {
        $oldpin = htmlentities($_POST["oldpin"]);
        $newpin = htmlentities($_POST["newpin"]);
        $repin = htmlentities($_POST["repin"]);
        
        if($oldpin=='' && $newpin=='' && $repin=='')
        {
            echo "<script language='Javascript'>
            window.alert('Fields are empty')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpin!='' && $newpin=='' && $repin=='')
        {
            echo "<script language='Javascript'>
            window.alert('Some fields are empty')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpin=='' && $newpin!='' && $repin=='')
        {
            echo "<script language='Javascript'>
            window.alert('Some fields are empty')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpin=='' && $newpin=='' && $repin!='')
        {
            echo "<script language='Javascript'>
            window.alert('Some fields are empty')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpin!='' && $newpin=='' && $repin!='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter New PIN')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpin!='' && $newpin!='' && $repin=='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter New PIN Again')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        if($oldpin=='' && $newpin!='' && $repin!='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter Old PIN')
            window.location.href='./user-home.php#setting'
            </script>";
        }
        
        if($newpin == $repin)
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
                $sql = $connect->prepare("SELECT username,email,PIN FROM user WHERE UID = ? ");
                $sql->bind_param("s", $UID);
                $sql->execute();
                $sql->bind_result($username,$email,$verifypin);
                $res = $sql->fetch();
                if($res)
                {
                    if($oldpin == $verifypin)
                    {
                        $sql->close();
                        $sql = $connect->prepare("UPDATE user SET PIN = ? WHERE UID = ? ");
                        $sql->bind_param("ss", $newpin,$UID);
                        $res1 = $sql->execute();
                        
                        if($res1)
                        {
                            /********Mail Sent to current user **************/
                            $to = $email;
                            $subject = "Universal Card Team - Account PIN has been changed";
                            $message = '<html>
                                        <head bgcolor="#7D3C98">
                                          <title>Account PIN has been changed</title>
                                        </head>
                                        <body>
                                          <h2>Universal Card Team</h2>
                                          <h3><b>As per your request,</b></h3>
                                          <h4><b>Username = '.$username.' Account PIN has been changed.</b></h4>
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
                                window.alert('PIN has been changed successfully. Notification sent.')
                                window.location.href='./user-home.php#setting'
                                </script>";
                            }
                            else
                            {
                                $sql->close();
                                $connect->close();                
                                echo "<script language='Javascript'>
                                window.alert('PIN has been changed successfully. Notification couldnt sent.')
                                window.location.href='./user-home.php#setting'
                                </script>";
                            }
                        }
                        else
                        {
                            $sql->close();
                            $connect->close();
                            echo "<script language='Javascript'>
                            window.alert('PIN didnt Change try again later.')
                            window.location.href='./user-home.php#setting'
                            </script>";
                        }
                    }
                    else
                    {
                        $sql->close();
                        $connect->close();
                        echo "<script language='Javascript'>
                        window.alert('Enter a valid old PIN.')
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
                window.alert('Failed to change PIN: ".$e->getMessage()."')
                window.location.href='./user-home.php#setting'
                </script>";
            }
        }
        else
        {
            echo "<script language='Javascript'>
            window.alert('PIN didnt match')
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