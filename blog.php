<?php
    try{
    $user = 'root';
    $password = '';

    $pdo = new PDO('mysql:host=localhost;dbname=blog1', 'root', '', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
    }

    catch (PDOExpection $e) {
        die('Keine Verbindung zur Datenbank möglich:' . $e -> getMessage());
    }

    $query = 'select * from post limit 3';

    If (($_GET['action'] ?? '')==='all'){
        $query = 'select * from posts order by created_at desc';
    }

    $stmt = $pdo->query($query);
    $post = $stmt -> fetchAll();

    // var_dump ($posts);

    foreach ($posts as $post){
        echo $post["created_by"] . ', Post:' . $post["post_text"] . '<br>';
    }

?>


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
				<h1>Blog erfassen:</h1>
				</div>
			</div>
		
	
			<div id="content">
				<div id="content-inner">
				
					<main id="contentbar">
						<div class="article">
                        
                        <?php
                        echo '<dl>';
                            if (count($errors)>0){
                                for($i = 0; $i<count($errors); $i++){
                                echo "<li class= 'error-box'>$errors[$i]</li>";
                                }
                            }
                            echo '/<dl>';
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