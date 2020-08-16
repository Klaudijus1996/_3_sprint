<?php 
    if (isset($_GET['del'])) {
        $delete = $_GET['del'];
        $page = $entityManager->find('Pages', $delete);
        $entityManager->remove($page);
        $entityManager->flush();
        header('Location: ../admin/index.php');
    }
?>