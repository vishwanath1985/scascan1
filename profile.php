<?php
session_start();
if(isset($_SESSION['uname']))
{
$user=$_SESSION['uname'];

echo "Hello $user";
#connect database
$con=mysqli_connect("localhost","root","bose123$","bankdb");
#select * from banktable where username='$user'

 $result=mysqli_query($con,"select * from banktable where username='$user'");
 
#extarct data from tablereceived


 $row = mysqli_fetch_row($result);
 $balance=$row[3];
 
 $row[0]=htmlspecialchars($row[0]);

//#extract blance from data and display

echo "<br><br>Your account number $row[0]";
echo "<br><br>Your emilid : $row[4]";
echo "<br><br>Your phone number: $row[5]";
echo "<br><br>Your balance: $row[3]";
echo "<!-- <br><br>Your feedback:$row[6] -->";

//#logout page


}

else
	
{
header('Location:login.php');
}

?>


<br><br> <a href='logout.php'>Signout</a> | <a href='transfer.php'>Transfer</a> | <a href='feedback.php'>Feedback</a>  

<?php
session_start();
  if(isset($_SESSION['uname']))
	{

		$user = $_SESSION['uname'];
	
		If($user == "admin")
			{
				echo "|<a href='validatekyc.php'>ValidateKyc</a>";
	
				}
		
	}


?>


<br><br> <a href='displaydata.php'>Show Password</a> | <a href='fileupload.php'>Know Your Customer(KYC)</a>
