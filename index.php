<?php
    declare(strict_types=1);
    $request = $_SERVER['REQUEST_URI'];
    $root = '/_3_sprint';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
    <header>
        <?echo "
            <nav>
                <a href='$root/home'>Home</a>
                <a href='$root/about'>About Us</a>
                <a href='$root/contact'>Contact Us</a>
                <a href='$root/services'>Services</a>
            </nav>";?>
    </header>
    <main>
        <?php
        switch ($request) {
            case $root.'/' :
                require __DIR__ . '/src/views/home.php';
                break;
            case $root.'/about' :
                require __DIR__ . '/src/views/about.php';
                break;
            case $root.'/contact' :
                require __DIR__ . '/src/views/contact.php';
                break;
            case $root.'/services' :
                require __DIR__ . '/src/views/services.php';
                break;
            case $root.'/home' :
                require __DIR__ . '/src/views/home.php';
                break;
        }
        ?>
    </main>
    <footer>
        <h5><?echo "&#169;  ".date("h:i:sa").'<br>'.date("Y-m-d"); ?></h5>
    </footer>
    </div>
</body>
</html>