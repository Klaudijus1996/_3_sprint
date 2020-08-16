<?php 
    session_start();
    include_once('../bootstrap.php');
    include_once('../script/del.php');
    include_once('../script/logout.php');
    $pages = $entityManager->getRepository('Pages')->findAll();
    if (isset($_SESSION['logged_in'])) {
        // display admin content ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../styles/main.css">
            <link rel="stylesheet" href="../styles/admin.css">
            <title>Admin</title>
        </head>
        <body>
            <header>
                <nav>
                    <a href="index.php">Admin</a>
                    <a href="../index.php">View Page</a>
                    <a href="index.php?logout=out">Logout</a>
                </nav>
            </header>
            <main>
                <table>
                <tr>
                    <?php foreach($pages as $page) { ?>
                    <td><?php echo $page->getTitle(); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php foreach($pages as $page) { if ($page->getTitle() == 'Home') { ?> <td><a href="#"></a></td> <?php } else {?>
                    <td><a href="index.php?del=<?php echo $page->getID(); ?>">Del</a></td>
                    <?php }} ?> 
                </tr>
                <tr>
                    <?php foreach($pages as $page) { ?>
                    <td><a href="index.php?edit=<?php echo $page->getID(); ?>">Edit</a></td>
                    <?php } ?>
                </tr>
                </table>
                <?php include_once('../script/add.php'); include_once('../script/edit.php') ?>
                <a href="index.php?add=addnew">Add</a>
            </main>
            <footer>
                    <h5><?echo "&#169;  ".date("h:i:sa").'<br>'.date("Y-m-d"); ?></h5>
            </footer>
        </body>
        </html>

    <?php } else {
        if (isset($_POST['username']) && isset($_POST['userpassword'])) {
            $username = $_POST['username'];
            $password = $_POST['userpassword'];
            if (empty($username) || empty($password)) {
                $error = "Please provide username and password!";
            } else {
                $user = $entityManager->getRepository('User')->findBy(array('username' => 'admin', 'userpassword' =>'password'));
                $adminName = $user[0]->getUsername();
                $adminPsw = $user[0]->getPassword();
                if ($username != $adminName || $password != $adminPsw) {
                    $error = "Incorrect information has been entered!";
                } else {
                    $_SESSION['logged_in'] = true;

                    header('Location: index.php');
                    exit();
                }
            }
        }
        ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <?php if(isset($error)) { ?> <p style="color: #aa0000;"><?echo $error?></p> <?php } ?>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="userpassword" placeholder="Password">
            <input type="submit" value="Login">
        </form>
    </body>
    </html>
    
    <?php } ?>