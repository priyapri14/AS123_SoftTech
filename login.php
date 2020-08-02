<?php
	
	$uname = $_POST['uname'];
	$ps = $_POST['password'];

	if($uname=="cyber" && $ps=="cyber") 
	{
		header('Location: result.php');
		# code...
	}
	else
	{
		header('Location: finalerror.html');
	}
?>