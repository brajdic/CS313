<?php 
?>
<h1>Assignments</h1>
<li>
<?
$assignments = scandir(.); 
foreach($assignment as $assignments) :?>
<a href="<?php echo($assignment)?>"></a>
<?php endforeach; ?>
</li>
