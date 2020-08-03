 <?php 

 	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';
	require 'PHPMailer/Exception.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;



	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$vkey = mt_rand(1000,9999);

	session_start();

	$_SESSION["suname"]=$uname;
	$_SESSION["semail"]=$email;

	/*$event="CREATE EVENT myevent
	ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 MINUTE_SECOND
	DO
	UPDATE report1 SET verif=0 where verif=1;";*/


	if(!empty($uname)|| !empty($email))
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
			$SELECT ="SELECT email from report1 where email=? limit 1";
			$INSERT ="INSERT into report1(uname,email,vkey)values(?,?,?)";
			$update ="UPDATE report1 set vkey='$vkey',uname='$uname',verif=0 where email='$email'";

			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum=$stmt->num_rows;

			if($rnum==0)
			{
				$stmt->close();
				$stmt=$conn->prepare($INSERT);
				$stmt->bind_param("sss",$uname,$email,$vkey);
				$stmt->execute();
				echo "Submitted sucessfully";
				header('Location: confirm.html');
				//mail
				$to=$email;
				$subject="email verification otp:";
				$message="Your otp is:$vkey .Enter in the site to Continue.";
				//$headers="from: upleasebe@gmail.com";

				//mail($to,$subject,$message,$headers);

				$mail=new PHPMailer();
				$mail->isSMTP();
				$mail->Host="smtp.gmail.com";
				$mail->SMTPAuth="true";
				$mail->SMTPSecure="tls";
				$mail->Port="587";
				$mail->Username="snooptechorg@gmail.com";
				$mail->Password="snooptech_123";
				$mail->Subject=$subject;
				$mail->setFrom("snooptechorg@gmail.com");
				$mail->Body=$message;
				$mail->addAddress($to);
				$mail->Send();

			}
			else
			{
				$stmt->close();
				$stmt=$conn->prepare($update);
				$stmt->bind_param("s",$vkey);
				$stmt->execute();
				echo "Submitted sucessfully";
				header('Location: confirm.html');
				//mail
				$to=$email;
				$subject="email verification otp:";
				$message="Your otp is:$vkey .Enter in the site to Continue.";
				//$headers="from: upleasebe@gmail.com";

				//mail($to,$subject,$message,$headers);
				//echo"email already registered";

				$mail=new PHPMailer();
				$mail->isSMTP();
				$mail->Host="smtp.gmail.com";
				$mail->SMTPAuth="true";
				$mail->SMTPSecure="tls";
				$mail->Port="587";
				$mail->Username="snooptechorg@gmail.com";
				$mail->Password="snooptech_123";
				$mail->Subject=$subject;
				$mail->setFrom("snooptechorg@gmail.com");
				$mail->Body=$message;
				$mail->addAddress($to);
				$mail->Send();
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

	/*$msg="You have entered the snoopsite";
	$msg=wordwrap($msg,70);
	mail($email, "snoopsite", $msg);*/


 ?>
