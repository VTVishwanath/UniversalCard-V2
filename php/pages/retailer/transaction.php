<?php
if(isset($_POST['rfid']) && isset($_POST['pin']) && isset($_POST['cost']))
{
    $retailerid = "1";
    $rfid = $_POST['rfid'];
    $pin = $_POST['pin'];
    $cost = $_POST['cost'];
    $option = "Other";
    
    $a = "Success";
    $b = "Failed";
    
    $connect = mysqli_connect('localhost', 'id1549285_uc', 'VTV9591104023', 'id1549285_uc') or die("Couldn't connect to database");
    try
    {
        $sql = $connect->prepare("SELECT UID,balance FROM user WHERE RFID = ? and PIN = ? ");
        $sql->bind_param("ss", $rfid,$pin);
        $sql->execute();
        $sql->bind_result($UID,$bal);
        $res = $sql->fetch();
        if($res)
        {
            if ($bal >= $cost)
            {
                $sql->close();
                $sql = $connect->prepare("UPDATE user SET balance = balance - ? WHERE UID = ? ");
                $sql->bind_param("ss", $cost,$UID);
                $sql->execute();
                $sql->close();
                $sql = $connect->prepare("UPDATE retailer SET balance = balance + ? WHERE RID = ? ");
                $sql->bind_param("ss", $cost,$retailerid);
                $sql->execute();
                $sql->close();
                $sql = $connect->prepare("INSERT INTO `bill` (`date`, `total_amt`, `type`, `UID`, `RID`, `status`) VALUES ( NOW(), ?, ?, ?, ?, ?)");
                $sql->bind_param("sssss", $cost,$option,$UID,$retailerid,$a);
                $sql->execute();
                $sql->close();
                echo "Success";
            }
            else
            {
                $sql->close();
                $sql = $connect->prepare("INSERT INTO `bill` (`date`, `total_amt`, `type`, `UID`, `RID`, `status`) VALUES ( NOW(), ?, ?, ?, ?, ?)");
                $sql->bind_param("sssss", $cost,$option,$UID,$retailerid,$b);
                $sql->execute();
                $sql->close();
                $connect->close();
                echo "Failed";
            }
        }
        else
        {
            $sql->close();
            $connect->close();
            echo "User doesnt exists";
        }
    }
    catch(Exception $e)
    {
        $sql->close();
        $sql = $connect->prepare("INSERT INTO `bill` (`date`, `total_amt`, `type`, `UID`, `RID`, `status`) VALUES ( NOW(), ?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $cost,$option,$UID,$retailerid,$b);
        $sql->execute();
        $sql->close();
        $connect->close();
        echo "Failed";
    }
}
else
{
	echo "Welcome to Universal Card";
}
?>