<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['uid'])){
    $ID = $_SESSION['id'];  //unique session ID
    $UID = $_SESSION['uid'];    //User ID
?>
<!DOCTYPE html>
<html>
<title>Welcome | User Home</title>
<link rel="icon" href="./images/fevicon.png" type="image/gif" sizes="16x16">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="./css/w3.css">
<link rel="stylesheet" href="./css/font-poppins.css"-->
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="./css/home.css">
<body>

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-purple w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidenav"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-padding-xlarge w3-hide-large w3-display-topleft w3-hover-white" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>UNIVERSAL<br>CARD</b></h3>
  </div>
  <a href="#" onclick="w3_close()" class="w3-padding w3-hover-white">Home</a> 
  <a href="#profile" onclick="w3_close()" class="w3-padding w3-hover-white">Profile</a> 
  <a href="#transaction" onclick="w3_close()" class="w3-padding w3-hover-white">Transaction Details</a> 
  <a href="#gift" onclick="w3_close()" class="w3-padding w3-hover-white">Send money</a> 
  <a href="#setting" onclick="w3_close()" class="w3-padding w3-hover-white">Settings</a> 
  <a href="#contact" onclick="w3_close()" class="w3-padding w3-hover-white">Contact us</a>
  <a href="#logout" onclick="logout()" class="w3-padding w3-hover-white">Log Out</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-purple w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-purple w3-margin-right" onclick="w3_open()">☰</a>
  <span>UNIVERSAL CARD</span>
</header>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="profile">
    <h1 class="w3-jumbo"><b>User Profile</b></h1>
    <h1 class="w3-xxxlarge w3-text-orange"><b>Details.</b></h1>
    <hr style="width:50px;border:5px solid orange" class="w3-round">
  </div>
  
  <!-- Profile iformation starts-->
  <div class="w3-row-padding">
    <?php
    try
    {
        $connect = new mysqli("localhost", "id1549285_uc", "VTV9591104023", "id1549285_uc"); //creating the connection
        /* check connection */
        $c2 = $connect;
        if ($connect->connect_errno)
        {
            echo "Failed to connect to MySQL: (" . $connect->connect_errno . ") " . $connect->connect_error;
            header('Location: ../../loginpage.php');
        }
    }
    catch (Exception $e)  // Handling the exception
    {
        echo "Unable to connect: " . $e->getMessage();
        header('Location: ../../loginpage.php');
    }
    try
    {
        $sql = $connect->prepare("SELECT username,profile_photo,phone,email,balance,RFID FROM user WHERE UID = ? ");
        $sql->bind_param("s", $UID);
        $sql->execute();
        $sql->bind_result($username, $profile_photo, $phone, $email, $balance, $RFID);
        $res = $sql->fetch();
        if($res)
        {
        ?>
            <div class="w3-half">
              <img src="./images/profile_photo/<?php echo "$profile_photo"; ?>" style="width:100%" onclick="onClick(this)" alt="<?php echo "$username"; ?>">
            </div>
            <div class="w3-half">
                <h1 class="w3-xlarge w3-text-black"><b>--------------------</b></h1>
                <h1 class="w3-xlarge w3-text-black"><b>User ID: <?php echo $UID;?></b></h1>
                <h1 class="w3-xlarge w3-text-black"><b>Username: <?php echo $username;?></b></h1>
                <h1 class="w3-xlarge w3-text-black"><b>Phone Number: <?php echo $phone;?></b></h1>
                <h1 class="w3-xlarge w3-text-black"><b>Email: <?php echo $email;?></b></h1>
                <h1 class="w3-xlarge w3-text-black"><b>RF Card ID: <?php echo $RFID;?></b></h1>
                <h1 class="w3-xlarge w3-text-black"><b>--------------------</b></h1>
                <h1 class="w3-xxlarge w3-text-orange"><b>Balance: <?php echo $balance;?></b></h1>
                <h1 class="w3-xlarge w3-text-black"><b>--------------------</b></h1>
            </div>
        <?php
        $sql->close();
        }
        else
        {
            $sql->close();
            echo "Unable to display the details";
            echo "<script language='Javascript'>
            window.alert('Something went wrong contact Administrator')
            window.location.href='../../loginpage.php'
            </script>";
        }
    }
    catch (Exception $e)
    {
        $sql->close();
        echo "Failed to get detailes: " . $e->getMessage();
        header('Location: ../../loginpage.php');
    }
    ?>
  </div>
  <!-- Profile iformation ends-->

  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black w3-padding-0" onclick="this.style.display='none'">
    <span class="w3-closebtn w3-text-white w3-opacity w3-hover-opacity-off w3-xxlarge w3-container w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>

  <!-- Transaction details starts-->
  <div class="w3-container" id="transaction" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-orange"><b>Transaction Details.</b></h1>
    <hr style="width:50px;border:5px solid orange" class="w3-round">
    <?php
    try
    {
        $sql = $connect->prepare("SELECT BID,date,total_amt,type,RID,status FROM bill WHERE UID = ? ORDER BY BID DESC");
        $sql->bind_param("s", $UID);
        $sql->execute();
        $sql->bind_result($BID, $date, $total_amt, $type, $RID, $status);
        ?>
        <div class="w3-responsive w3-container" style="max-height: 500px;">
            <table class="w3-responsive w3-table-all w3-centered w3-hoverable w3-card-4 w3-large">
                <tr class="w3-orange">
                    <th>Bill ID</th>
                    <th>Date and time</th>
                    <th>Total amount</th>
                    <th>Type</th>
                    <th>Retailer</th>
                    <th>Status</th>
                </tr>
            <?php while($sql->fetch()): ?>
                <tr class="w3-hover-purple">
                    <td><?php echo $BID; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $total_amt; ?></td>
                    <td><?php echo $type; ?></td>
                    <td><?php echo $RID; ?></td>
                    <td><?php echo $status; ?></td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
        <!--div class="w3-responsive w3-container w3-center">
          <button class="w3-button w3-padding-large w3-purple w3-margin-top" onclick="load_more()">Load More</button>
        </div-->
        <?php
         $sql->close();
    }
    catch (Exception $e)
    {
        $sql->close();
        echo "Failed to get detailes: " . $e->getMessage();
        header('Location: ../../loginpage.php');
    }
    ?>
  </div>
  <!-- Transaction details ends-->

  <!-- Send Money starts -->
  <div class="w3-container" id="gift" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-orange"><b>Send Money.</b></h1>
    <hr style="width:50px;border:5px solid orange" class="w3-round">
    <p>You can send money to other user</p>
    <form action="./gift_money.php" method="post" enctype="multipart/form-data">
      <div class="w3-group">
        <label>User Phone Number</label>
        <input class="w3-input w3-border" type="text" name="phone" pattern="^[789][0-9]{9}$" minlength="10" maxlength="10" title="Enter a valid 10 digit phone number" required>
      </div>
      <div class="w3-group">
        <label>Enter Amount</label>
        <input class="w3-input w3-border" type="number" name="amount" min="1" max="1000" title="Amount should be between 1 and 1000 Rupees" required>
      </div>
      <div class="w3-group">
        <label>Your PIN</label>
        <input class="w3-input w3-border" type="password" pattern="^[0-9]{4}$" name="pin" maxlength="4" minlength="4" title="Please enter 4 digit valid PIN" required>
      </div>
      <input type="submit" class="w3-button w3-block w3-padding-large w3-purple w3-margin-bottom" name="submit" value="Send Money">
    </form>  
  </div>
  <!-- Send Money ends -->  

  <!-- Packages / Pricing Tables -->
  <div class="w3-container" id="setting" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-orange"><b>Settings.</b></h1>
    <hr style="width:50px;border:5px solid orange" class="w3-round">
    <p>You can change your Password here.</p>
    <form action="./changepassword.php" method="post" enctype="multipart/form-data">
      <div class="w3-group">
        <label>Old Password</label>
        <input class="w3-input w3-border" type="password" name="oldpass" minlength="6" maxlength="50" title="Please enter the password of length between 6 and 50 charecter" required>
      </div>
      <div class="w3-group">
        <label>New Password</label>
        <input class="w3-input w3-border" type="password" name="newpass" minlength="6" maxlength="50" title="Please enter the password of length between 6 and 50 charecter" required>
      </div>
      <div class="w3-group">
        <label>Enter Password Again</label>
        <input class="w3-input w3-border" type="password" name="repass" minlength="6" maxlength="50" title="Please enter the password of length between 6 and 50 charecter" required>
      </div>
      <input type="submit" class="w3-button w3-block w3-padding-large w3-purple w3-margin-bottom" name="submit" value="Change Password">
    </form>
    <hr style="width:50px;border:5px solid orange" class="w3-round">
    <p>You can change your PIN here.</p>
    <form action="./changepin.php" method="post" enctype="multipart/form-data">
      <div class="w3-group">
        <label>Old PIN</label>
        <input class="w3-input w3-border" type="password" pattern="^[0-9]{4}$" name="oldpin" maxlength="4" minlength="4" title="Please enter 4 digit valid PIN" required>
      </div>
      <div class="w3-group">
        <label>New PIN</label>
        <input class="w3-input w3-border" type="password" pattern="^[0-9]{4}$" name="newpin" maxlength="4" minlength="4" title="Please enter 4 digit valid PIN" required>
      </div>
      <div class="w3-group">
        <label>Enter PIN Again</label>
        <input class="w3-input w3-border" type="password" pattern="^[0-9]{4}$" name="repin" maxlength="4" minlength="4" title="Please enter 4 digit valid PIN" required>
      </div>
      <input type="submit" class="w3-button w3-block w3-padding-large w3-purple w3-margin-bottom" name="submit" value="Change PIN">
    </form>
  </div>
  
  
  <!-- Contact -->
  <div class="w3-container" id="contact" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-orange"><b>Contact us.</b></h1>
    <hr style="width:50px;border:5px solid orange" class="w3-round">
      <p>Do you want help? Then go to FAQ's section and find answers.</p>
      <p>Still facing problem ? Then Fill out the form with details. We are happy to serve you. :)</p>
    <form action="./contact_us.php" method="post" enctype="multipart/form-data">
      <div class="w3-group">
        <label>Subject</label>
        <input class="w3-input w3-border" type="text" name="subject" required>
      </div>
      <div class="w3-group">
        <label>Message</label>
        <textarea class="w3-input w3-border" name="message" required></textarea>
      </div>
      <input type="submit" class="w3-button w3-block w3-padding-large w3-purple w3-margin-bottom" name="submit" value="Send Message">
    </form>  
  </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
<p class="w3-right"> © 2017 www.universalcard.000webhostapp.com All rights reserved | Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></p>
</div>

<script>
// Script to open and close sidenav
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
function logout() {
  var result = confirm("Do you really want to log out?");
  if(result == true){
    location.href='./logout.php';
  }else{
    location.reload();
  }
}
function load_more()
{

}
</script>

</body>
</html>
<?php
}
else {
  header('Location: ../../loginpage.php');
}
?>