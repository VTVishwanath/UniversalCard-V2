<?php
session_start();
if(isset($_SESSION["id"]) && isset($_SESSION["uid"]))
{
    $ID = $_SESSION["id"];
    $UID = $_SESSION["uid"];
    if(isset($_POST["subject"]) && isset($_POST["message"]) && isset($_POST["submit"]))
    {
        $subject = htmlentities($_POST["subject"]);
        $message = htmlentities($_POST["message"]);
        
        if($subject=='' && $message=='')
        {
            echo "<script language='Javascript'>
            window.alert('Fields are empty')
            window.location.href='./user-home.php#contact'
            </script>";
        }
        if($subject!='' && $message=='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter subject')
            window.location.href='./user-home.php#contact'
            </script>";
        }
        if($subject=='' && $message!='')
        {
            echo "<script language='Javascript'>
            window.alert('Enter message')
            window.location.href='./user-home.php#contact'
            </script>";
        }
        
        try
        {
            $connect = new mysqli("localhost", "id1549285_uc", "VTV9591104023", "id1549285_uc"); //creating the connection
            /* check connection */
            if ($connect->connect_errno)
            {
                echo "Failed to connect to MySQL: (" . $connect->connect_errno . ") " . $connect->connect_error;
                header('Location: ./user-home.php#contact');
            }
        }
        catch (Exception $e)
        {
          echo "Unable to connect: " . $e->getMessage();
          header('Location: ./user-home.php#contact');
        }
        
        try
        {
            $sql = $connect->prepare("SELECT username,email FROM user WHERE UID = ? ");
            $sql->bind_param("s", $UID);
            $sql->execute();
            $sql->bind_result($username,$email);
            $res = $sql->fetch();
            
            if($res)
            {
                $to = "team.universalcard@gmail.com";
                $subject = $subject." - Request from UID = ".$UID." and Username = ".$username." ";
                $message1 = '<html>
                            <head>
                              <title>Request from '.$username.' </title>
                            </head>
                            <body>
                              <h2>Request To Universal Card - from '.$email.' with Username = '.$username.' and UID = '.$UID.'</h2>
                              <h4></h4>
                              <h4>Subject - '.$subject.'</h4>
                              <h4></h4>
                              <h4>'.$message.'</h4>
                            </body>
                            </html>';
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                #$headers .= "Content-type: text/html - Dont Reply To this mail \r\n";   #<= add this for to get a html file
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";    #<= add this for to get a plain text
                #Content-type: text/html for html file to be send or Content-type: text/plain for normal text
                $headers .= "To: ".$to." \r\n";
                $headers .= "From: ".$email." \r\n";

                $retval = mail ($to,$subject,$message1,$headers);
                if($retval)
                {
                    echo "<script language='Javascript'>
                    window.alert('Message sent successfully...')
                    window.location.href='./user-home.php#contact'
                    </script>";
                }
                else
                {
                    echo "<script language='Javascript'>
                    window.alert('Message could not be sent...')
                    window.location.href='./user-home.php#contact'
                    </script>";
                 }
            }
            else
            {
                echo "<script language='Javascript'>
                window.alert('Unable to send message try again later.')
                window.location.href='./user-home.php#contact'
                </script>";
            }
        }
        catch (Exception $e)
        {
            echo "<script language='Javascript'>
            window.alert('Failed to send message: ".$e->getMessage()."')
            window.location.href='./user-home.php#contact'
            </script>";
        }
    }
    else
    {
        header('Location: ./user-home.php#contact');
    }
}
else
{
    header('Location: ../../loginpage.php');
}
?>