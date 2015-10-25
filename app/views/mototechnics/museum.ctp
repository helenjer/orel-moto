<?php  $this->Html->addCrumb('Мототехника', '');
       $this->Html->addCrumb('Наш музей', ''); ?>
<h1>Наш музей</h1>
<div class="ca-text">

	<?php 
		foreach ($motos as $key=>$moto) {

			 echo "<div class='motolist-item'>";
				
			 echo "<div class='mi-left'>";
					echo "<a href='/mototechnics/view/".$moto['Mototechnic']['id']."' class='mil-link'>";
						// check if new added model
						if ($moto['Mototechnic']['is_new']) echo "<span class='icon-new'></span>";
						
						if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "</a>";
			 if (!empty($moto['Mototechnic']['price'])) echo '<div class="price"> Цена: <span>'.$moto['Mototechnic']['price'].' руб.</span></div>';
			 if (!empty($moto['Mototechnic']['presence'])) echo '<div class="presence"><span>'.$moto['Mototechnic']['presence'].'</span></div>';			
		    
			 echo "</div>";
					
					
					echo "<h3>".$this->Html->link($moto['Mototechnic']['model'], array('admin'=> false,'controller' => 'mototechnics', 'action' => 'view', $moto['Mototechnic']['id']))."</h3>";
					echo "<div class='motolist-item-desc'>".$moto['Mototechnic']['short_txt']."</div>";
					echo "<a href='/mototechnics/view/".$moto['Mototechnic']['id']."' class='btn-more'></a>";
					echo "<div class='clear'></div>";
			 
				echo "</div>";
				
			};
	?>	
</div>
