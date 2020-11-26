<?php
    $errors = [];
    
    $user = 'root';
    $password = '';

    $pdo = new PDO('mysql:host=localhost;dbname=blog1', 'root', '', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);

    //If (($_GET['action'] ?? '')==='all'){
        //$query = 'select * from posts order by created_at desc';
    //}
    $query = 'select * from posts limit 3';

    $stmt = $pdo -> query($query);
    $rows = $stmt -> fetchAll();

    //var_dump ($posts);

    foreach($rows as $rows) {
        echo $rows ["created_by"]. ', Post: ' . $rows["post_text"] .'<br>';
    }

    $name    = $_POST['name']    ?? '';
    $contribution   = $_POST['contribution']   ?? '';
    $date    = date ('d.m.y H:i:s');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
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
                    <?php if(count($errors) > 0) : ?>
                    <div class="error-box">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <form action="blog.php" method="post">
                    <legend class="form-legend">Ihr Beitrag:<br><br></legend>
                        <div class="form-group">
                            <label class="form-label" for="name">Ihr Name<br></label>
                            <input class="form-control" type="text" id="name" name="name" value="<?= $name?>">
                        </div>

                        <div class="form-group">
                            <label for="contribution" class="contribution">Ihr Blogbeitrag:<br></label>
                            <textarea name="contribution" id="contribution" rows="5" class="contribution"><?= $contribution?></textarea>
                        </div>

                        <div class="form-actions">
                            <input class="btn btn-primary" type="submit" value="Beitrag posten">
                            <a href="blog.php" class="btn">Beitrag abbrechen</a>
                         </div>
                        

                    <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        }
                        if (empty($name)) {
                            $errors[] = 'Bitte geben Sie einen Namen ein.';
                        }
                        if (empty($contribution)) {
                        $errors[] = 'Bitte geben Sie einen Text ein.';
                        }
                        ?>
                                    
					</div>
				</main>
					
					
				<div class="clr"></div>
				</div></div>
		
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