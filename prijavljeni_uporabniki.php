<?php
    include_once 'session.php';
    include_once 'database.php';
?>
<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Turistika</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
                <script src="http://maps.googleapis.com/maps/api/js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
                <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Karla%7CMontserrat">
                <!--<link rel="stylesheet" href="css/screen.css">-->
                <link rel="stylesheet" href="css/lightbox.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	</head>
	<body class="homepage">

		<!-- Header -->
			<header id="header">
				<div>
					<div>
						<p>TURISTIKA - najboljše destinacije ta HIP</p>
					</div>
				</div>
			</header>

		<!-- Nav -->
			<nav id="nav" class="skel-layers-fixed">
				<ul>
					<li class="current"><a href="index.php">Domov</a></li>	
                                        <li><a href="countries.php">Države</a></li>
                                        <li><a href="destinations.php">Destinacije</a></li>					
                                        <?php 
                                            if (!isset($_SESSION['user_id'])) {
                                                echo '<li><a href="login.php">Prijava</a></li>';
                                                echo '<li><a href="registration.php">Registracija</a></li>';
                                            }
                                            else {
                                                
                                                echo '<li><a href="logout.php">Odjava ('.
                                                        $_SESSION['first_name'].')</a></li>';
                                                if($_SESSION['admin'] == 1) { echo "<a  style='text-decoration:none' href='prijavljeni.php'><b style='color:#EFD510;'>ADMIN</b></a>";
                                                                              echo "<a  style='text-decoration:none' href='sporocila.php'><b style='color:#EFD510;'>&nbsp; SPOROČILA</b></a>"; }
                                            }
                                                
                                            
                                        ?> 
					                                   
										
				</ul>
			</nav>
		
		<!-- Banner -->
			<div id="banner-wrapper">
				
			</div>

		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
				
					<div class="row 200%">
						<div class="12u">

							<!-- Features -->
								<section class="box features">
									<h2  class="major"><span>PRIJAVLJENI UPORABNIKI</span></h2>
									<div>
                                                                            <?php 
                                                                                //preverimo za error
                                                                                if (isset($_SESSION['error'])) {
                                                                                    echo '<div id="error">';
                                                                                    echo $_SESSION['error'];
                                                                                    echo '</div>';
                                                                                    unset($_SESSION['error']);
                                                                                }
                                                                                //preverimo za success
                                                                                if (isset($_SESSION['success'])) {
                                                                                    echo '<div id="success">';
                                                                                    echo $_SESSION['success'];
                                                                                    echo '</div>';
                                                                                    unset($_SESSION['success']);
                                                                                }
                                        
                                        if(isset($_GET['id']) && $_SESSION['user_id']) {
                                            $id = $_GET['id'];
                                            $sql = "SELECT DISTINCT u.first_name, u.last_name, d.title FROM users u INNER JOIN prijavljeni p ON u.id = p.user_id INNER JOIN destinations d ON d.id = p.destination_id WHERE p.destination_id = '". $id . "';";
                                            $result = mysqli_query($link, $sql);
                                            echo "<table class='table table-bordered'><th><b>Ime</b></th><th><b>Priimek</b></th><th><b>Destinacija</b></th>";
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['title'] . "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</table>"; 
                                        }
                                                                     ?>
                                                                            















<?php
include_once 'footer.php';
?>