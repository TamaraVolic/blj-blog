
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
				<h1>Heading</h1>
				</div>
			</div>
		
	
			<div id="content">
				<div id="content-inner">
				
					<main id="contentbar">
						<div class="article">
							<p>jskfdasdfkjl</p>
						</div>
					</main>
					
					<nav id="sidebar">
						<div class="widget">
							<h3>Weitere Infos:</h3>
							<ul>
							<li><a href="#">Link 1</a></li>
							<li><a href="#">Link 2</a></li>
							<li><a href="#">Link 3</a></li>
							<li><a href="#">Link 4</a></li>
							<li><a href="#">Link 5</a></li>
							</ul>
						</div>
					</nav>
					
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
