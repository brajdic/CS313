<?php
session_start();
   $_SESSION['lastPage'] = $action;
?>

    <nav class ="two">
        <li class = "nav"><a href=".">All</a></li>
    <?php foreach($categories as $category) : ?>
            <li class="nav">
                <a href="?action=<?php echo $category['categoryName']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
            <li class = "nav">
            <a href="?action=video">Class Video</a>
            </li>
</nav>
</header>
<hr>
