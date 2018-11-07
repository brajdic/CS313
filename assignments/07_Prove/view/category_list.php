<?php
session_start();
   $_SESSION['lastPage'] = $action;
?>

    <nav class ="one">
    <?php foreach($categories as $category) : ?>
            <li>
                <a href="?action=<?php echo $category['categoryName']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
</nav>

