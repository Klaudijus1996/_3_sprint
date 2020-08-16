<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $pages = $entityManager->getRepository('Pages')->findAll();
        $page = $entityManager->find('Pages', $id);
        $page != NULL ? print "<div class='content'>
                                    <p>".$page->getContent()."</p></div>" : '';
    } else {
        $page = $entityManager->find('Pages', 1);
        $page != NULL ? print "<div class='content'>
                                    <p>".$page->getContent()."</p></div>" : '';
    }
?>
