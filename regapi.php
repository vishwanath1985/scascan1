<?php

$json = file_get_contents('php://input');

$info = json_decode($json);

$name = $info->{'name'};
$tel = $info->{'tel'};
$email = $info->{'email'};
$password = $info->{'pwd'};


//echo "$name - $tel - $email - $password";

if(isset($name))
{
$con=mysqli_connect("localhost","root","bose123$","bankdb");
$result=mysqli_query($con,"SELECT * FROM banktable where username='$name'");

$num=mysqli_num_rows($result);

	if($num>0)
		{

			echo "Already registered with username <b> $name </b> or email id <b> $email </b> ..!!";

		}

		else

		{
			mysqli_query($con,"INSERT INTO banktable(username,password,balance,feedback,mobile,email)VALUES('$name','$password',0,'nofeedback','$tel','$email');");
			echo "Registration completed";

		}

}
else
{

echo "params missing in api request";

}

