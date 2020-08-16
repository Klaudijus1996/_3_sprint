<?php 
    if (isset($_GET['edit'])) {
        $edit = $_GET['edit'];
        $pages = $entityManager->getRepository('Pages')->findAll();
        $page = $entityManager->find('Pages', $edit);
        ?>
        <form action="" method="post" autocomplete="off">
            <input type="text" name="update-title" value="<?echo $page->getTitle();?>">
            <textarea name="update-content" cols="30" rows="10"><?echo $page->getContent();?></textarea>
            <input type="submit" value="Done">
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