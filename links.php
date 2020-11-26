<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Links</title>
    <link rel="stylesheet" href="home.css">

    </head>
	<body>
		<div id="page">
			<header id="header">
				<div id="header-inner">	
					<div id="logo">
						<img src="img/BlogLogo.PNG" alt="Logo">
					</div>
					<div id="top-nav">
          <?php
            include 'navi.php';
          ?>
					</div>
					<div class="clr"></div>
				</div>
			</header>
			<div class="feature">
				<div class="feature-inner">
				<h1>Weitere Blogs:<h1>
				</div>
			</div>
		
	
			<div id="content">
				<div id="content-inner">
				
					<main id="contentbar">
						<div class="article">
						<?php
							$dbuser = "d041e_listuder";
							$dbpass = "12345_Db!!!";

							$dbConnection = new PDO("mysql:host=mysql2.webland.ch;dbname=d041e_listuder", $dbuser, $dbpass, [
								PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
								PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
							]);

							$sqlQuery = $dbConnection->query("SELECT * FROM blog_url");
							$urls = $sqlQuery->fetchAll();

							

							echo '<h1>Blogs meiner BLJ-Kollegen</h1>';

							foreach($urls as $url) {
								$link = '<a href="' . $url["blogUrl"] . '" target="_blank">' . $url["blogAuthor"] . '\'s Blog' . '</a>' . '<br>';

							echo $link;
							} 

						?>
						</div>
					</main>
					
					<div class="clr"></div>
				</div>
			</div>
		
			<div id="footerblurb">
				<div id="footerblurb-inner">
				
					<div class="column">
          <h2>Kontakt</h2>
            <p>E-mail: besipiel@beispiel.ch</p>
            <p>Telefonnummer: 000 111 22 33</p>
					</div>	
					
					<div class="clr"></div>
				</div>
			</div>
			<footer id="footer">
				<div id="footer-inner">
        <p>BLJ-Projekt 2020 PHP</p>
					<div class="clr"></div>
				</div>
			</footer>
		</div>
	</body>
</html>

