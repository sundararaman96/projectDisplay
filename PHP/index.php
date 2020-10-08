<?php
session_start();
?>



<HTML>
<HEAD>
<style>
	input[type=text],
	select {
		width: 50%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	input[type=password],
	select {
		width: 50%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	input[type=submit] {
		width: 30%;
		background-color: #226666;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	input[type=submit]:hover {
		background-color: #45a049;
	}

	div {
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 20px;
	}

	body {
		background-image: linear-gradient(white, green);
	}

	h1 {
		font-size: 48px;
		color: #226666;
	}

	p {
		font-size: 32px;
		color: #226666;
	}

	form {
		float: center;
	}
</style>
</HEAD>
<BODY>


<h1> Welcome! Please Login to Continue </h1>

<div>
<form action="index.php" method="POST">
	<input type="text" name="username" placeholder="Enter username">
	<input type="password" name="password" placeholder="Enter password">
	<img src="capcha.php" /><input type="text" name="captcha" placeholder="Enter the values in the image" />
	<input type="submit" name="submit" value="Login" />
</form>
</div>

</BODY>
</HTML>


<?php
session_start();
	
	if(isset($_POST) & !empty($_POST)){
		if($_POST['captcha'] == $_SESSION['code']){
			if(isset($_REQUEST['submit'])){
				
				$username = $_REQUEST['username'];
				$passowrd = $_REQUEST['password'];
				
				$dbuser = "aveerapandian";  
				$dbpass = "Drake#batman31"; 
				$db = "SSID"; 
				$connect = OCILogon($dbuser, $dbpass, $db); 
				if (!$connect)  
					{ 
					echo "Error! Cannot be connected to the database"; 
					exit; 
					} 
					
				$query = "SELECT * FROM USERS WHERE USERNAME='".$username."'"; 
				$stmt = OCIParse($connect, $query); 
				if(!$stmt) 
					{ 
					?>  
					<div>
					<h3>Error!</h3>
					<p>An error occurred in parsing the SQL </p>
					</div>
					<?php
					exit; 
					} 
				OCIExecute($stmt);
			   
				if(OCIFetch($stmt)) {
				   
					if($username==OCIResult($stmt,"USERNAME")){
		
					   if($passowrd == OCIResult($stmt,"PASSWORD")){
						$_SESSION['username'] = $username;
						echo "<script>window.location='display_data.php'</script>";
					   }else{
							echo "<p><center>Incorrect Password. Please Try again!</center></p>";
					   }
					}
				}else{
						echo "<p><center>Please enter a valid user name</center></p>";
				   }
		}
		}else{
			echo "<center>Capcha Invalid</center>";
		}
	}
?>