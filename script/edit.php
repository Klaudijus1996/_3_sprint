<?php 
    if (isset($_GET['edit'])) {
        $edit = $_GET['edit'];
        $pages = $entityManager->getRepository('Pages')->findAll();
        $page = $entityManager->find('Pages', $edit);
        ?>
        <form action="" method="post" autocomplete="off">
            Page Title<input type="text" name="update-title" value="<?echo $page->getTitle();?>">
            Content<textarea name="update-content" cols="90" rows="20"><?echo $page->getContent();?></textarea>
            <input class="sub" type="submit" value="Update">
            <div><a href="index.php">Cancel</a></div>
        </form>
<?php 
        if (isset($_POST['update-title']) || isset($_POST['update-content'])) {
            $title = $_POST['update-title'];
            $content = $_POST['update-content'];
            $page->setTitle($title);
            $page->setContent($content);
            $entityManager->flush();
            header('Location: ../admin/index.php');
        }
    }
?>