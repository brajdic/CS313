<?php 
?>
<h1>Assignments</h1>
<ul>
<?php
$assignments = array_slice(scandir('./assignments'), 2); 
foreach($assignments as $assignment): ?>
<li><a href="<?php echo("?action=".$assignment)?>"><?php echo($assignment)?><br><br></a></li>
<?php endforeach; ?>
</ul>
