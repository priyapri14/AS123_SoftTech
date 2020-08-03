<?php

//$email = $_POST['email'];
$otp = $_POST['otp'];
//$verif= mysql_query("SELECT verif FROM product1 where vkey='$otp' LIMIT 1");
if (!empty($otp)) {
	# code...

	$mysqli = NEW mysqli('localhost','root','','snoop');


    $update= $mysqli->query("UPDATE report1 SET verif = 1 where  '$otp'=vkey  ");
	
	$que="SELECT verif FROM report1 where vkey='$otp' LIMIT 1 ";
	$result=$mysqli->query($que);
	if($result->num_rows > 0)
	{
		while ($row=$result->fetch_assoc())
		{
			$verif=$row["verif"];
		}
	}
	else
	{
		echo"0 results";
	}
	
	if($verif==1)
	{
		header('Location: dashresult.php');
		echo"S";
	
	}
	else
	{
			# code...
		header('Location: fotp.html');
	}

		
	
	//header('Location: home3.html')
}
else
{
	die("Something went wrong");
}
$mysqli->close();

?>
