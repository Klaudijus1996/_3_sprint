<?php
require_once "bootstrap.php";
// require_once "page.php";
$pages = $entityManager->getRepository('Pages')->findAll();
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
    <header>
        <nav>
            <?php foreach($pages as $page) {?>
            <a href="index.php?id=<?php echo $page->getID(); ?>">
                <?php echo $page->getTitle(); ?>
            </a>
            <?php } ?>
            <a href="admin/index.php">Admin</a>
        </nav>
    </header>
    <main>
        <?php include_once('script/page.php') ?>
    </main>
    <footer>
            <h5><?echo "&#169;  ".date("h:i:sa").'<br>'.date("Y-m-d"); ?></h5>
    </footer>
</body>
</html>