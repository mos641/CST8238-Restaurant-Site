<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>WP Eatery - Mailing List</title>
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
        <?php 
        
        require "db_config.php";
        
        try {
            
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<h2>Mailing List </h2>";
            
            $sqlQuery = "SELECT * FROM mailingList";
            
            $result = $pdo->query( $sqlQuery );
            
            $rowCount = $result->rowCount();
            
            if($rowCount == 0)
                echo "There are no Contacts in Mailing List.";
                else
                {
                    echo "<table style=\"width: 80%;\">";
                    echo "<tr>";
                    echo "<td><b>Full Name</b></td>";
                    echo "<td><b>Email Address</b></td>";
                    echo "<td><b>Phone</b></td>";
                    echo "</tr>";
                    for($i=0; $i<$rowCount; ++$i)
                    {
                        $row = $result->fetch();
                        
                        echo "<tr>";
                        echo "<td>$row[1] $row[2]</td>";
                        echo "<td>$row[4]</td>";
                        echo "<td>$row[3]</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                
                $pdo = null;
                
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    	
    	</div>
		<!-- End Content -->
		<footer>
                <?php include_once 'Footer.php';?>
            </footer>
	</div>
	<!-- End Wrapper -->
</body>