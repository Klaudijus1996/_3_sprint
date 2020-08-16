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
                        <th>Page Title</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach($pages as $page) { ?>
                    <tr>
                        <td><?echo $page->getTitle()?></td>
                        <td><?php if ($page->getTitle() == 'Home') { 
                            echo "<a hre='#'></a>";
                            } else { ?> 
                            <a class="del" href="index.php?del=<?php echo $page->getID(); ?>">Del</a> <?php 
                            } ?> 
                            <a class="edit" href="index.php?edit=<?php echo $page->getID(); ?>">Edit</a></td>
                    </tr>
                    <?php } ?>
                </table>
                <div class='links'><a href="index.php?add=addnew">Add</a></div>
                <?php include_once('../script/add.php'); include_once('../script/edit.php') ?>
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
        <link rel="stylesheet" href="../styles/main.css">
        <link rel="stylesheet" href="../styles/admin.css">
        <title>Login</title>
    </head>
    <body>
        <header>
            <nav>
                <?php foreach($pages as $page) {?>
                <a href="../index.php?id=<?php echo $page->getID(); ?>">
                    <?php echo $page->getTitle(); ?>
                </a>
                <?php } ?>
                <a href="index.php">Admin</a>
            </nav>
        </header>
        <main>
            <?php if(isset($error)) { ?> <p style="display: block; color: #aa0000; font-family: italic; font-size: 13px; font-weight: 700"><?echo $error?></p> <?php } ?>
            <form class="login" action="" method="post" autocomplete="off">
            *Enter Username<input type="text" name="username" placeholder="Username">
            *Enter Password<input type="password" name="userpassword" placeholder="Password">
                <input class="sub" type="submit" value="Login">
            </form>
        </main>
        <footer>
            <h5><?echo "&#169;  ".date("\n l jS F Y"); ?></h5>
        </footer>
    </body>
    </html>
    
    <?php } ?>