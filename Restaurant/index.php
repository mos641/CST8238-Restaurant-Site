<!DOCTYPE html>
<html>
    <head>
        <title>WP Eatery - Home</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <?php include_once 'Header.php';?>
            <?php include_once 'Menu.php';?>
            <div id="content" class="clearfix">
                <aside>
                        <h2><?php date_default_timezone_set("America/New_York"); echo date("l");?>'s Specials</h2>
                        <hr>
                        <img src="images/burger_small.jpg" alt="Burger" title="Monday's Special - Burger">
                        <h3>The WP Burger</h3>
                        <p>Freshly made all-beef patty served up with homefries - $14</p>
                        <hr>
                        <img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
                        <h3>WP Kebobs</h3>
                        <p>Tender cuts of beef and chicken, served with your choice of side - $17</p>
                        <hr>
                        <h2>Private Dining</h2>
                        <img src="images/dining_room_sm.jpg" width="228" alt="Dining Room" title="The WP Eatery Dining Room">
                        <p>Call us to find out more about our private dinning options.</p>
                </aside>
                <div class="main">
                    <h1>Welcome to WP Eatery!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    
                    
                    
                    <h3>Upcoming Events ...</h3>
                    <?php include_once 'class_lib.php';
                    $event1 = new Eventitem("CET End of Semester Party","Tuesday August 24, 2021","Join us in celebrating the end of the semester!","$20.00");
                    $event2 = new Eventitem("Web Programming Study Session","Monday August 16, 2021","Join us for food while you study for you final exam!","$30.00");
                    
                    echo "<p>
                    <strong class=\"event\"> ".$event1->get_name()."</strong><br/>
                    <strong>Date:</strong> ".$event1->get_date()."<br/>
                    <strong>Time:</strong> 8pm<br/>
                    <strong>Price:</strong> ".$event1->get_price()."<br/>
                    ".$event1->get_desc()."
                    </p>
                    <p>
                    <strong class=\"event\"> ".$event2->get_name()."</strong><br/>
                    <strong>Date:</strong> ".$event2->get_date()."<br/>
                    <strong>Time:</strong> 6pm<br/>
                    <strong>Price:</strong> ".$event2->get_price()."<br/>
                    ".$event2->get_desc()."
                    </p>";

                    ?>
                                        
                    
                    
                    <h2>Book your Private Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div><!-- End Main -->
            </div><!-- End Content -->
            <footer>
                <?php include_once 'Footer.php';?>
            </footer>
        </div><!-- End Wrapper -->
    </body>
</html>
