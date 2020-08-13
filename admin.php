
<!DOCTYPE html>
<?php include('script/data.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
    <div class='container'>
    <?php 
        if (isset($_POST['login']) && !empty($_POST['username']) 
        && !empty($_POST['password'])) {
    if ($_POST['username'] == 'name' && 
    $_POST['password'] == 'password') {
        session_start();
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'name';
        ob_get_clean();
    } else {
        echo $login_warning;
    }
        } else {
    echo $login_form;
    }
    ?>
    </div>
    <div class="main">
    <header>
        <?echo "
            <nav>
                <a href='$root/home'>Admin</a>
                <a href='$root/index.php'>View Website</a>
                <a href='$root/script/logout.php'>Logout</a>
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
    </main>
</body>
</html>