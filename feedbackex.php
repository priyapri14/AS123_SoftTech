<?php 
	$feedback = $_POST['feedback'];

	if(!empty($feedback))
	{
		$host = "localhost";
		$dbUsername="root";
		$dbPassword="";
		$dbname="snoop";
		$conn= new mysqli($host , $dbUsername,$dbPassword,$dbname);

		if(mysqli_connect_error())
		{
			die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}
		else
		{
			$SELECT ="SELECT feedback from feedbackex where feedback=? limit 1";
			$INSERT ="INSERT into feedbackex(feedback)values(?)";

			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s",$feedback);
			$stmt->execute();
			$stmt->bind_result($feedback);
			$stmt->store_result();
			$rnum=$stmt->num_rows;
			if($rnum==0)
				$stmt->close();
				$stmt=$conn->prepare($INSERT);
				$stmt->bind_param("s",$feedback);
				$stmt->execute();
				echo "Submitted sucessfully";
			$stmt->close();
			$conn->close();
		}

	}
	else
	{
		echo "All fields are required";
		die();
	}


 ?>
