 <?php 

 	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';
	require 'PHPMailer/Exception.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


	$email = $_POST['email'];
	$vkey = mt_rand(1000,9999);

	session_start();

	$_SESSION["qemail"]=$email;

	/*$event="CREATE EVENT myevent
	ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 MINUTE_SECOND
	DO
	UPDATE report1 SET verif=0 where verif=1;";*/


	if(!empty($email))
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
			$update ="UPDATE report1 set vkey='$vkey',verif=0 where email='$email'";
		
			$stmt=$conn->prepare($update);
			$stmt->bind_param("s",$vkey);
			$stmt->execute();
			echo "Submitted sucessfully";
			header('Location: confirm1.html');
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
