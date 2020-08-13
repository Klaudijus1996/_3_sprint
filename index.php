<?php
$request = $_SERVER['REQUEST_URI'];
$root = '/_3_sprint';
switch ($request) {
    case $root.'/' :
        // require __DIR__ . 'index.php';
        break;
    case $root.'' :
        require __DIR__ . '/index.php';
        break;
    case $root.'/about' :
        require __DIR__ . '/src/views/about.php';
        break;
    case $root.'/news' :
        require __DIR__ . '/src/views/news.php';
        break;
    default:
        http_response_code(404);
        // require __DIR__ . 'src/views/404.php';
        break;
}
// echo "<a href='$root/about'>About</a>
        // <a href='$root/news'>News</a>"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello there!</h1>
    <?echo "<a href='$root/about'>About</a>
            <a href='$root/news'>News</a>";?>
</body>
</html>