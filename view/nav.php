<?php
   session_start();
   $_SESSION['lastPage'] = $action;
   echo($_SESSION["last_visitor"]);
?>

    <nav class ="two">
        <li class = "nav"><a href="?action=about">About</a> <a href="?action=assignments">Class Assignments</a></li>
</nav>
</header>
<hr>
