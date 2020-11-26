<?php
$user = 'root';
$password = '';

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$errors = [];
$formSent= false;

$title =$_POST['title']?? '';
$content =$_POST['content']?? '';
$creatdat =$_POST['creatdat']?? '';
$creatby =$_POST['username']?? '';

if ($_SERVER['REQUEST_METHOD']=== 'POST'){

    $title = trim($title);
    $content = trim($content);

    if ($title === ''){
        array_push($errors, "The title is invalid");
    }
    if ($content === ''){
        array_push($errors, "Content is invalid");
    }
    if ($createdat === ''){
        array_push($errors, "Date is invalid");
    }
    if ($createdby === ''){
        array_push($errors, "Author is invalid");
    }

    if (count($errors)=== 0){
        $dbconnection = new PDO('mysql:host=localhost;dbname=blog', $user, $password);
        $stmt =$dbconnection->prepare("INSERT INTO blog(created_by, created_at, post_title, post_text) VALUES (:created_by, now(), :post_text)");
        $stmt->execute(["created_by"=> "$createdby", ":post_title" => "$createdby", ":post_title" => "$title",":post_text" => "$content"]);


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
                        <form action ="blog.php" methode="post" class="formular">
                            <label for="title"></label><br>
                            <input type="text" id="title" name ="title" placeholder ="Title:" require>
                            <label for="username"></label>
                            <input type="text" id="username" name ="username" placeholder ="Created by:" require>
                            <label for="createdat"></label>
                            <input type="datetime local" id="creatdat" name ="creatdat" placeholder ="Created at:" require>
                            <label for="content" class="contentinput"></label><br>
                            <textarea id="content" name="content" rows="30" cols="163" placeholder ="Content:" require></textarea><br>
                            <button type="submit" value="submit">Submit</button>
                        </form>
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