<div class="ca-text mototech-admin"> 
<h2>Редактирование мототехники</h2>

<?php echo $this->Html->link('+ Добавить модель', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'add'), array('class' => 'add-entity-link')); ?>		
<?php echo $this->Mototech->categoriesAnchorList($models); ?>

	<?php foreach ($models as $type => $list) {
			echo "<h2 id='".$type."'>".$this->Mototech->typeName($type, 1)."</h2>";
			foreach ($list as $moto)  {
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
			}
	?>
		
		<?php // echo "<br>".$this->Html->link("Редактировать описание страницы Мототехника", array('admin' => true, 'controller' => 'mototechnics', 'action' => 'mototechnics_meta'/*, $idmeta['Page']['id']*/)); 
		?>

<br><br>
</div>		
	
	
