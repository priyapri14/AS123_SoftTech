 <?php

 	session_start();

 	$uname=$_SESSION["suname"];
 	$email=$_SESSION["semail"];

	$state = $_POST['state'];
	$district= $_POST['district'];
	$social = $_POST['social'];
	$categ = $_POST['categ'];
	$accid = $_POST['accid'];
	$susid = $_POST['susid'];
	$comp=$_POST["comp"];

	
	if(!empty($uname)||!empty($email)||!empty($state)||!empty($district)||!empty($social)||!empty($categ))
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
			$SELECT ="SELECT email from report2 where email=?";
			$INSERT ="INSERT into report2(uname,email,state,district,medium,category,userid,susid,complain,attempts)values(?,?,?,?,?,?,?,?,?,?)";

			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum=$stmt->num_rows+1;
			if($rnum<=5)
			{
				$stmt->close();
				$stmt=$conn->prepare($INSERT);
				$stmt->bind_param("sssssssssi",$uname,$email,$state,$district,$social,$categ,$accid,$susid,$comp,$rnum);
				$stmt->execute();
				echo "Submitted sucessfully";			
				$x=1;
			}
			else
			{
				$x=0;
				header('Location: final5l.html');
			}
			$stmt->close();
			$conn->close();
		}

	}
	else
	{
		echo "All fields are required";
		die();
	}


	
	$name = $_POST['susid'];


	if(!empty($name) && $x==1)
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
			header('Location: finalerror.html');
		}
		
		
		$conn->close();
		$stmt->close();


		if(!empty($r))
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

			
			$INSERT="INSERT INTO chat(`from`,`to`,`message`)VALUES(3,$r,'WARNING-By Indian Penal Code-Section 66E,you are now under the surveillance of Cyber Crime Department.Any act of performing further harassments on online you may have to face severe crisis.')";	

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

			$INSERT1="INSERT INTO conversations(`from`,`to`,`cid`)VALUES(3,$r,$last_id)";	

			if ($conn->query($INSERT1)===TRUE) 
			{
				# code...
				echo"sucessfully";
				header('Location: final.html');
				
				
			}
			else
			{
				echo "error";
			}

			$conn->close();
		}
	}


 ?>
