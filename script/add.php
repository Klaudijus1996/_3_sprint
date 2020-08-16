<?php
if (isset($_GET['add'])) { ?>
    <form action="" method="post" autocomplete="off">
        *Enter page title<input type="text" name="page-title">
        *Enter content<textarea name="page-content" cols="90" rows="20"></textarea>
        <input style="cursor: pointer" class="sub" type="submit" value="Create">
        <div><a href="index.php">Cancel</a></div>
    </form>
<?php 
    if (isset($_POST['page-title']) && isset($_POST['page-content'])) {
        $newPageTitle = $_POST['page-title'];
        $newPageContent = $_POST['page-content'];
        $page = new Pages();
        $page->setTitle($newPageTitle);
        $page->setContent(nl2br($newPageContent));
        $entityManager->persist($page);
        $entityManager->flush();
        header('Location: ../admin/index.php');
    } 
}
?>