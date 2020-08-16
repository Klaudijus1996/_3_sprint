<?php
if (isset($_GET['add'])) { ?>
    <form action="" method="post">
        <input type="text" name="page-title">
        <textarea name="page-content" cols="30" rows="10"></textarea>
        <input type="submit" value="Create">
    </form>
<?php 
    if (isset($_POST['page-title']) && isset($_POST['page-content'])) {
        $newPageTitle = $_POST['page-title'];
        $newPageContent = $_POST['page-content'];
        $page = new Pages();
        $page->setTitle($newPageTitle);
        $page->setContent($newPageContent);
        $entityManager->persist($page);
        $entityManager->flush();
        header('Location: ../admin/index.php');
    } 
}
?>