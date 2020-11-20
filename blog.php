<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="blog.css">
</head>
    <body>
        <header class="container">
            <a href="home.php"><img src="img/yourbloglogo.PNG" alt="blog logo"></a>
        </header>

        <?php
        include 'navi.php';
        ?>
        <main>
            <?php
        $user = 'root';
    $password = '';

    $pdo = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);


    $pdo->query("INSERT INTO posts (created_by, created_at, post_message) VALUES ('$id', '$name', '$message')");
?>
        </main>
    </body>
</html>