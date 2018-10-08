<h3>Cat Fact</h3>
<ul>
<li>
<?php
System('curl -s https://catfact.ninja/fact | grep -oP \':"\K[^"]+\'');?>
</li>
</ul>