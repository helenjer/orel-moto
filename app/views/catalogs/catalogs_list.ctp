<h1>Каталог  <?= $company['Company']['title'] ?></h1>
<div class="ca-text">
	
	<?php
	
		foreach ($catalogs as $catalog) {
			echo $this->Html->link($catalog['Catalog']['title'], $catalog['Catalog']['url']).'<br>';
		}	
		?>

	
	<div class="clear"></div>
</div>



