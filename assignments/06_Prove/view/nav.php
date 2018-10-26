<?php
session_start();
   $_SESSION['lastPage'] = $action;
?>
</header>
    <nav>
        <li class ="nav"><a href=".">All</a></li>
		<?php foreach($categories as $category) : ?>
            <li class="nav">
				<a href="?action=<?php echo $category['categoryName']; ?>">
					<?php echo $category['categoryName']; ?>
				</a>
            </li>
        <?php endforeach; ?>      
</nav>
<hr>