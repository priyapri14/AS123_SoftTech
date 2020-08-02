<!DOCTYPE html>
<html lang="en">
<head>
	<title>SnoopSite</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <style type="text/css">
    	table
    	{
    		border-collapse: collapse;
    		width: 100%;
    		color: black;
    		font-family: monospace;
    		font-size: 14px;
    		text-align: left;
    	}
    	th
    	{
    		background-color: #c745ff;
    		color: white;
    	}
    	tr:nth-child(even)
    	{
    		background-color: #f2f2f2;
    	}
    </style>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="css\bootstrap.min.css">
<!--===============================================================================================-->
	<script type="text/javascript" src="js\jquery.min.js"></script>
	<script type="text/javascript" src="js\bootstrap.min.js"></script>
</head>
<body style="background-color: #999999;">
<script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </script>


    <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
		<button class="navbar-toggler navbar-toggler-right " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand " href="temp.html"><img src="logo1.png" style="height: 50px">SnoopSiteCD</a>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item ">
					<a class="nav-link" href="tempex.html">Home<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="feedbackex.html" style="cursor: pointer">feedback<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="login.html" style="cursor: pointer">Login<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" data-toggle="collapse" data-target="#form" style="cursor: pointer">about<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" data-toggle="collapse" data-target="#form" style="cursor: pointer">contact<span class="sr-only">(current)</span></a>
				</li>
				 
			</ul>
		</div>
	</nav>
	
	<div class="limiter">
		<div class="container-login100">
            <div class="login100-more"  style="background-image:url('images/img-01.png');"></div>
			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<div class="container" >
				
					<table>
						<th>Sno</th>
						<th>User name</th>
						<th>User email</th>
						<th>State</th>
						<th>District</th>
						<th>Medium</th>
						<th>Category</th>
						<th>ID of user</th>
						<th>Suspect userid</th>
						<th>Complaint</th>
						<th>Attemts</th>
						

						<?php
							$conn= mysqli_connect("localhost" , "root","","snoop");
							if($conn->connect_error)
							{
								die("Connection failed:".$conn->connect_error);
							}

							$sql="SELECT `sno`, `uname`, `email`, `state`, `district`, `medium`, `category`, `userid`, `susid`, `complain`,`attempts`  FROM `report2`  ORDER BY `susid`  DESC";
							$result=$conn->query($sql);

							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{
									echo"<tr><td>".$row["sno"]."</td><td>".$row["uname"]."</td><td>".$row["email"]."</td><td>".$row["state"]."</td><td>".$row["district"]."</td><td>".$row["medium"]."</td><td>".$row["category"]."</td><td>".$row["userid"]."</td><td>".$row["susid"]."</td><td>".$row["complain"]."</td><td>".$row["attempts"]."</td></tr>";
								}
								echo"</table>";
							}
							else
							{
								echo"error";
							}

							$conn->close();
						?>
					</table>

				</div>
				
			</div>
		</div>
	</div>
</div>

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>