<div class="ca-text mototech-admin"> 
<h2>Редактирование велосипедов</h2>

<?php echo $this->Html->link('Добавить модель', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'add', 'bicycle'))."<br />"; ?>		
<?php echo $this->Html->link('Добавить прайс-лист', array('admin' => true, 'controller' => 'motofiles', 'action' => 'add', 'bicycle'))."<br /><br />"; ?>
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


		<h2>Детские</h2>
		<?php
			foreach ($children as $moto) {
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
			
			show_motofiles($motofiles_children, $this);
			
		?>
		
		<br>
		<h2>Складные</h2>
		<?php
			foreach ($folding as $moto) {
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
			
			show_motofiles($motofiles_folding, $this);
			
		?>
		
		<br>
		<h2>Дорожные</h2>
		<?php
			foreach ($road as $moto) {
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
			
			show_motofiles($motofiles_road, $this);
		?>
		
		<br>
		<h2>Спортивные</h2>
		<?php
			foreach ($sport as $moto) {
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
			
			show_motofiles($motofiles_sport, $this);
		?>
		
		<br>
		<h2>Двухподвесные</h2>
		<?php
			foreach ($two_suspend as $moto) {
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
			
			show_motofiles($motofiles_two_suspend, $this);
		?>
		

		
		<?php // echo "<br>".$this->Html->link("Редактировать описание страницы Мототехника", array('admin' => true, 'controller' => 'mototechnics', 'action' => 'mototechnics_meta'/*, $idmeta['Page']['id']*/)); 
		?>

<br><br>
</div>		
	
	
