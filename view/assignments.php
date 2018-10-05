<?php 
?>
<h1>Assignments</h1>
<li>
<?
$assignments = scandir(.); 
foreach($assignments as $assignment) :?>
hello<a href="<?php echo($assignment)?>"></a>
<?php endforeach; ?>
</li>
