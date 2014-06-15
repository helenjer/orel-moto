<div class="ca-text mototech-admin"> 
<h2>Редактирование детского транспорта</h2>

<?php echo $this->Html->link('+ Добавить модель', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'add', 'motochild'), array('class' => 'add-entity-link'))."<br />"; ?>		
<?php echo $this->Html->link('Добавить прайс-лист', array('admin' => true, 'controller' => 'motofiles', 'action' => 'add', 'motochild'))."<br /><br />"; ?>
<?php 
function show_motofiles ($files_arr, $this_) {
	if (!empty($files_arr)) {
		echo "<b><ins>Файлы прайс-листов*</ins></b> | ".sizeof($files_arr)." файл(а,ов)<br>";
		foreach ($files_arr as $moto) {
		echo "<b>".$moto['Motofile']['company']."</b>: ".$moto['Motofile']['url']."<br> ".
			$this_->Html->link('Редактировать', array('controller' => 'motofiles', 'admin'=>true, 'action' => 'edit', $moto['Motofile']['id'],  $moto['Motofile']['type']))." | ".
			$this_->Html->link('Удалить', array('controller' => 'motofiles','admin'=>true, 'action' => 'delete', $moto['Motofile']['id']), null, 'Файл будет удален. Вы уверены?')."<br>";
		}
		echo "<small class='notice-txt'>*на сайте отображется последний по дате добавления файл в рамках каждой фирмы</small><br>";
	}

}
?>

<?php echo $this->Mototech->categoriesAnchorList($models); ?>

<?php foreach ($models as $type => $list) {
			echo "<h2 id='".$type."'>".$this->Mototech->typeName($type, 1)."</h2>";
			foreach ($list['models'] as $moto)  {
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
				
				show_motofiles($list['files'], $this);
			}
	?>
		
		<?php // echo "<br>".$this->Html->link("Редактировать описание страницы Мототехника", array('admin' => true, 'controller' => 'mototechnics', 'action' => 'mototechnics_meta'/*, $idmeta['Page']['id']*/)); 
		?>

<br><br>
</div>		
	
	
