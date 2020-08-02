<?php 
	$message="hello";
	$f=3;
	$t=1;
	

	if(!empty($message))
	{
		$host = "localhost";
		$dbUsername="root";
		$dbPassword="";
		$dbname="snoop1";
		$conn= new mysqli($host , $dbUsername,$dbPassword,$dbname);

		if(mysqli_connect_error())
		{
			die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}

		
		$INSERT="INSERT INTO chat(`from`,`to`,`message`)VALUES(3,$t,'Warning message')";	

		if ($conn->query($INSERT)===TRUE) 
		{
			# code...
			echo"sucessfully";
			$last_id=$conn->insert_id;
			
		}
		else
		{
			echo "error";
		}

		$INSERT1="INSERT INTO conversations(`from`,`to`,`cid`)VALUES($f,$t,$last_id)";	

		if ($conn->query($INSERT1)===TRUE) 
		{
			# code...
			echo"sucessfully";
			
			
		}
		else
		{
			echo "error";
		}

		$conn->close();
	}


 ?>
