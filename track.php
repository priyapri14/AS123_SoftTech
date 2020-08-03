<?php 
	$compid = $_POST['compid'];

	if(!empty($compid))
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
			$SELECTW ="SELECT warning from report2 where sno=$compid";
			$SELECTS ="SELECT seen from report2 where sno=$compid";


			$stmt=$conn->prepare($SELECTS);			
			$stmt->execute();
			$result=$stmt->get_result();
			if($result->num_rows>0)
			{
				while ($row=$result->fetch_assoc()) 
				{
					$r=$row["seen"];				
				}		
				echo $r;
			}
			else
			{
				echo "error";
				header('Location: t3.html');
			}

			$stmt=$conn->prepare($SELECTW);			
			$stmt->execute();
			$result=$stmt->get_result();
			if($result->num_rows>0)
			{
				while ($row=$result->fetch_assoc()) 
				{
					$w=$row["warning"];				
				}		
				echo $w;
			}
			else
			{
				echo "error";
			}

			$conn->close();

			if ($r==1 && $w==1) 
			{
				header('Location: t1.html');
			}
			else if ($r==0 && $w==1) 
			{
				header('Location: t2.html');
			}
			else if ($r==1 && $w==0) 
			{
				header('Location: t4.html');
			}

		}

	}
	else
	{
		echo "All fields are required";
		die();
	}


 ?>
