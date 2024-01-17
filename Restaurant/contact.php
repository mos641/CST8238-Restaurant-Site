<?php
require "db_config.php";

$error = "";

if (! isset($_POST["firstName"]) && ! isset($_POST["lastName"]) && ! isset($_POST["phoneNumber"]) && ! isset($_POST["emailAddress"]) && ! isset($_POST["userName"]) && ! isset($_POST["referrer"])) {
    $error = "Please fill out the entire form.";
} else {
    if (! isset($_POST["firstName"]) || $_POST["firstName"] == "") {
        $error = "First Name can not be blank";
    } else if (! isset($_POST["lastName"]) || $_POST["lastName"] == "") {
        $error = "Last Name can not be blank";
    } else if (! isset($_POST["phoneNumber"]) || $_POST["phoneNumber"] == "") {
        $error = "Phone Number can not be blank";
    } else if (! isset($_POST["emailAddress"]) || $_POST["emailAddress"] == "") {
        $error = "Email Address can not be blank";
    } else if (! isset($_POST["userName"]) || $_POST["userName"] == "") {
        $error = "User Name can not be blank";
    } else if (! isset($_POST["referrer"]) || $_POST["referrer"] == "") {
        $error = "Referrer can not be blank";
    } else {
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $error = "Connected successfully";
            
            // check if email exists
            $found = FALSE;
            
            $sqlQuery = "SELECT * FROM mailingList";
            
            $result = $pdo->query($sqlQuery);
            
            $rowCount = $result->rowCount();
            
            if ($rowCount == 0)
                // do nothing
                pass;
                else {
                    // loop through each email
                    for ($i = 0; $i < $rowCount; $i ++) {
                        $row = $result->fetch();
                        if (strcmp($row[4], $_POST["emailAddress"]) == 0) {
                            $found = TRUE;
                            $error = "Email address entered is in use.";
                            
                            break;
                        }
                    }
                }
                
                // add if email is unique
                if ($found == FALSE) {
                    $sqlQuery = "INSERT INTO mailingList (firstName, lastName, phoneNumber, emailAddress, userName, referrer) VALUES('" . $_POST["firstName"] . "', '" . $_POST["lastName"] . "', '" . $_POST["phoneNumber"] . "', '" . $_POST["emailAddress"] . "', '" . $_POST["userName"] . "', '" . $_POST["referrer"] . "')";
                    
                    try {
                        $result = $pdo->query($sqlQuery);
                        
                        $error = "Added contact successfully";
                        
                    } catch (PDOException $e) {
                        $error = "Information could not be added:  " . $e->getMessage();
                    }
                }
                
                $pdo = null;
        } catch (PDOException $e) {
            echo "Connection failed:  " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>WP Eatery - Contact Us</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link
	href='http://fonts.googleapis.com/css?family=Fugaz+One|Muli|Open+Sans:400,700,800'
	rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="wrapper">
            <?php include_once 'Header.php';?>
            <?php include_once 'Menu.php';?>
            <div id="content" class="clearfix">
			<aside>
				<h2>Mailing Address</h2>
				<h3>
					1385 Woodroffe Ave<br> Ottawa, ON K4C1A4
				</h3>
				<h2>Phone Number</h2>
				<h3>(613)727-4723</h3>
				<h2>Fax Number</h2>
				<h3>(613)555-1212</h3>
				<h2>Email Address</h2>
				<h3>info@wpeatery.com</h3>
			</aside>
			<div class="main">
				<h1>Sign up for our newsletter</h1>
				<p>Please fill out the following form to be kept up to date with
					news, specials, and promotions from the WP eatery!</p>
				<form name="frmNewsletter" id="frmNewsletter" method="post"
					action="contact.php">
					<table>
						<tr>
							<td>First Name:</td>
							<td><input type="text" name="firstName" id="firstName" size='40'></td>
						</tr>
						<tr>
							<td>Last Name:</td>
							<td><input type="text" name="lastName" id="lastName" size='40'></td>
						</tr>
						<tr>
							<td>Phone Number:</td>
							<td><input type="text" name="phoneNumber" id="phoneNumber"
								size='40'></td>
						</tr>
						<tr>
							<td>Email Address:</td>
							<td><input type="text" name="emailAddress" id="emailAddress"
								size='40'>
						
						</tr>
						<tr>
							<td>Username:</td>
							<td><input type="text" name="userName" id="userName" size='20'>
						
						</tr>
						<tr>
							<td>How did you hear<br> about us?
							</td>
							<td><select name="referrer" size="1">
									<option>Select referer</option>
									<option value="newspaper">Newspaper</option>
									<option value="radio">Radio</option>
									<option value="tv">Television</option>
									<option value="other">Other</option>
							</select></td>
						</tr>
						<tr>
							<td colspan='2'><input type='submit' name='btnSubmit'
								id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset'
								name="btnReset" id="btnReset" value="Reset Form"></td>
						</tr>
					</table>
				</form>
				
				<?php echo "<br><br>".$error;?>
			</div>
			<!-- End Main -->
		</div>
		<!-- End Content -->
		<footer>
                <?php include_once 'Footer.php';?>
            </footer>
	</div>
	<!-- End Wrapper -->
</body>