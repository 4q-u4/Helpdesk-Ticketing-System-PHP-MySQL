<!DOCTYPE html>
<html>
	<head>
		<title>Registration</title>
		<style>
			body {
				font-family: Arial, sans-serif;
				background-color: #f2f2f2;
			}
			.container {
				max-width: 400px;
				margin: 0 auto;
				background-color: #fff;
				padding: 20px;
				border-radius: 5px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			}
			h2 {
				text-align: center;
			}
			form {
				display: flex;
				flex-direction: column;
			}
			input[type="text"], input[type="password"], input[type="file"] {
				margin-bottom: 10px;
				padding: 5px;
			}
			input[type="submit"] {
				background-color: #007BFF;
				color: #fff;
				border: none;
				padding: 10px;
				cursor: pointer;
			}
			input[type="submit"]:hover {
				background-color: #0056b3;
			}
    	</style>		
	</head>
	<body>
		<h2>Registration</h2>
		<form method="POST" action="Registration.php" enctype="multipart/form-data">
			Username: <input type="text" name="username" required><br><br>
			Password: <input type="password" name="password" required><br><br>
			Profile Image: <input type="file" name="image" accept="image/*"><br><br>
			<input type="submit" name="register" value="Register">
		</form>

		<?php
		if (isset($_POST['register'])) 
		{
			include 'Functions.php';
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$image = $_FILES['image']['name'];

			// Check if the username is already registered

			if (CheckUsername($username)) 
			{
				echo "Username is already taken. Please choose another one.";
			} 
			else 
			{
				// Upload the image
				$uploadDir = 'uploads/';
				$uploadFile = $uploadDir . basename($image);
				if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) 
				{
					UserRegistration($username, $password, $uploadFile);

					echo "Registration successful!<br>";
					echo "Username: $username<br>";
					echo "Profile Image: <img src='$uploadFile' alt='Profile Image'>";
				} 
				else 
				{
					echo "Failed to upload image.";
				}
			}
		}
		?>
	</body>
</html>
