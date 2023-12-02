<?php
include 'functions.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <!-- Link to your CSS stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?=template_header('Tickets')?>
<h2>My Account</h2>
<div class="btns">
		<a href="Registration.php" class="btn">Register</a>
	</div>
    <div class="btns">
		<a href="Login.php" class="btn">Login</a>
	</div>

    
<?=template_footer()?>

</body>
</html>
