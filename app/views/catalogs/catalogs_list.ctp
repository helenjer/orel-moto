<h1>Каталог  <?= $company['Company']['title'] ?></h1>
<div class="ca-text">
	
	<?php
	
		foreach ($catalogs as $catalog) {
			echo '<a href="/files/'.$catalog['Catalog']['url'].'" download>'.$catalog['Catalog']['title'].'</a><br>';
		}	
		?>

	
	<div class="clear"></div>
</div>



