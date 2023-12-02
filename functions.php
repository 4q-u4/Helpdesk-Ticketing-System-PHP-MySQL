<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'helpdesk';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

// Template header, feel free to customize this
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="css/style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>Ticketing System</h1>
                <a href="index.php"><i class="fas fa-table"></i>Dashboard</a>
                <a href="create.php"><i class="fas fa-ticket-alt"></i>Create Ticket</a>
                <a href="account.php"><i class="fas fa-user"></i>My Account</a>
                

            </div>
        </nav>
    EOT;
    }

    // Template footer
function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
    ?>

<?php
//testetstststssstststssts
	function CheckUsername($username)
	{
		$file = fopen("login.txt", "r");
		if(!$file)
		{
			die("Unable to open the file");
		}
		$userExists = false;
		while ($line = fgets($file)) 
		{
			$data = explode(":", $line);
			if ($data[0] == $username) 
			{
				$userExists = true;
				break;
			}
		}
		fclose($file);
		
		return $userExists;
	}

	function UserRegistration($username, $password, $uploadFile)
	{
		$userDetails = "$username:$password:$uploadFile\n";

		// Append the new user to the login.txt file
		$file = fopen("login.txt", "a");
		if(!$file)
		{
			die("Unable to open the file");
		}
		fwrite($file, $userDetails);
		fclose($file);	
	}

	function Login($username, $password)
	{
		$file = fopen("login.txt", "r");
		if(!$file)
		{
			die("Unable to open the file");
		}
		$authenticated = false;
		while ($line = fgets($file)) 
		{
			$data = explode(":", $line);
			if ($data[0] == $username && $password == $data[1]) 
			{
				$authenticated = true;
				break;
			}
		}
		fclose($file);
		return $authenticated;
	}
?>