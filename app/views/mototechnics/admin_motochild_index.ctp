<div class="ca-text mototech-admin"> 
<h2>Редактирование детского транспорта</h2>

<?php echo $this->Html->link('Добавить модель', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'add', 'motochild'))."<br />"; ?>		
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


		<h2>Автомобили аккумуляторные с радиоуправлением</h2>
		<?php
			foreach ($cars_akkum_radio as $moto) {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>Цена: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." руб.</b>"; else echo "--"; echo "</div>";
					echo "<div>Наличие: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";

					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('Редактировать', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id'],  $moto['Mototechnic']['type']))." | ".
								 $this->Html->link('Удалить', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, 'Модель будет удалена. Вы уверены?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>"; 
			}
			
			show_motofiles($motofiles_cars_akkum_radio, $this);
			
		?>
		
		<br>
		<h2>Автомобили аккумуляторные</h2>
		<?php
			foreach ($cars_akkum as $moto) {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>Цена: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." руб.</b>"; else echo "--"; echo "</div>";
					echo "<div>Наличие: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";
					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('Редактировать', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id'],  $moto['Mototechnic']['type']))." | ".
								 $this->Html->link('Удалить', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, 'Модель будет удалена. Вы уверены?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>"; 
			}
			
			show_motofiles($motofiles_cars_akkum, $this);
			
		?>
		
		<br>
		<h2>Мотоциклы аккумуляторные</h2>
		<?php
			foreach ($motocycle_akkum as $moto) {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>Цена: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." руб.</b>"; else echo "--"; echo "</div>";
					echo "<div>Наличие: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";
					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('Редактировать', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id'],  $moto['Mototechnic']['type']))." | ".
								 $this->Html->link('Удалить', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, 'Модель будет удалена. Вы уверены?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>"; 
			}
			
			show_motofiles($motofiles_motocycle_akkum, $this);
		?>
		
		<br>
		<h2>Велосипеды трёхколесные с ручкой управления</h2>
		<?php
			foreach ($bicycles_3 as $moto) {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>Цена: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." руб.</b>"; else echo "--"; echo "</div>";
					echo "<div>Наличие: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";
					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('Редактировать', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id'], $moto['Mototechnic']['type']))." | ".
								 $this->Html->link('Удалить', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, 'Модель будет удалена. Вы уверены?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>"; 
			}
			
			show_motofiles($motofiles_bicycles_3, $this);
		?>
		
		<br>
		<h2>Автомобили</h2>
		<?php
			foreach ($cars as $moto) {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>Цена: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." руб.</b>"; else echo "--"; echo "</div>";
					echo "<div>Наличие: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";
					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('Редактировать', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id'], $moto['Mototechnic']['type']))." | ".
								 $this->Html->link('Удалить', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, 'Модель будет удалена. Вы уверены?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>"; 
			}
			
			show_motofiles($motofiles_cars, $this);
		?>
		

		
		<?php // echo "<br>".$this->Html->link("Редактировать описание страницы Мототехника", array('admin' => true, 'controller' => 'mototechnics', 'action' => 'mototechnics_meta'/*, $idmeta['Page']['id']*/)); 
		?>

<br><br>
</div>		
	
	
