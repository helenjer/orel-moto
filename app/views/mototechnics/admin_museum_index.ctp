<div class="ca-text mototech-admin"> 
<h2>Редактирование раздела "Наш музей"</h2>

<?php echo $this->Html->link('+ Добавить модель', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'add', 'museum'), array('class' => 'add-entity-link'))."<br />"; ?>		
<br><br>
<?php 
			foreach ($models as $moto)  {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>Цена: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." руб.</b>"; else echo "--"; echo "</div>";
					echo "<div>Наличие: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";

					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('Редактировать', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id']))." | ".
								 $this->Html->link('Удалить', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, 'Модель будет удалена. Вы уверены?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>";
				}
				
			
	?>
		
		<?php // echo "<br>".$this->Html->link("Редактировать описание страницы Мототехника", array('admin' => true, 'controller' => 'mototechnics', 'action' => 'mototechnics_meta'/*, $idmeta['Page']['id']*/)); 
		?>

<br><br>
</div>		
	
	
