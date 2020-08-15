<?php
    declare(strict_types=1);
    require_once "bootstrap.php";
    include_once 'src/Pages.php';
    $request = $_SERVER['REQUEST_URI'];
    $root = '/_3_sprint';
    # Add page logic
    if (isset($_POST['page-title']) && isset($_POST['page-content'])) {
        $newPageTitle = $_POST['page-title'];
        $newPageContent = $_POST['page-content'];
        
        $page = new Pages();
        $page->setTitle($newPageTitle);
        $page->setContent($newPageContent);
        $entityManager->persist($page);
        $entityManager->flush();
        
        echo "Created Product with ID " . $page->getId() . "\n";
        header('Location: index.php');
    }
    # Add page logic end ::
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
        print("<pre>Find something: " . "<br></pre>");
        $pages = $entityManager->getRepository('Pages')->findAll();
        print("<table>");
        foreach($pages as $page)
            print("<tr>" 
                    . "<td>" . $page->getTitle()  . "</td>" 
                    . "<td>" . $page->getContent() . "</td>"
                . "</tr>");
        print("</table>"); 
        print("<hr>");
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