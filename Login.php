<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
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
			input[type="text"], input[type="password"] {
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
		<div class="container">
			<h2>Login</h2>
			<form method="POST" action="Login.php">
				Username: <input type="text" name="username" required>
				Password: <input type="password" name="password" required>
				<input type="submit" name="login" value="Login">
			</form>
			<?php
			if (isset($_POST['login'])) 
			{
				include 'Functions.php';

				$username = $_POST['username'];
				$password = $_POST['password'];

				if (Login($username, $password)) 
				{
					echo "Welcome, $username!";
				} 
				else 
				{
					echo "Invalid username or password. Please try again.";
				}
			}
			?>
		</div>
	</body>
</html>
