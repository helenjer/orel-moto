<h1>Каталоги</h1>
<div class="ca-text">
	
	<h2>Выберите фирму:</h2>
	<div class="companies-menu">
		<?php
	
		foreach ($companies as $company) {
			echo $this->Html->link('', array('admin'=> false, 'controller' => 'catalogs', 'action' => '?company='.$company['companies']['name']), array('class'=> 'company '.$company['companies']['name']));
		}	
		?>
	</div>
	
		
	<div class="clear"></div>
</div>



