<?php 
	$name="rith";

	if(!empty($name))
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

		$sql="SELECT idu from users where username=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("s",$name);
		$stmt->execute();

		$result=$stmt->get_result();
		//$user=$result->fetch_assoc();


		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) 
			{
				$r=$row["idu"];

				# code...
			}
			# code...
			echo $r;
		}

		else
		{
			echo "eror";
		}
		
		
		$conn->close();
		$stmt->close();
	}


 ?>
