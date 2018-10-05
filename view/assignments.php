<?php 
?>
<h1>Assignments</h1>
<ul>
<?
$assignments = array_slice(scandir('./assignments'), 2); 
foreach($assignments as $assignment) :?>
<li><a href="<?php echo("/assignments/".$assignment)?>"><?php echo($assignment)?></a></li>
<?php endforeach; ?>
</ul>
