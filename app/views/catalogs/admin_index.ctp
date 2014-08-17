<div class="ca-text mototech-admin"> 
<h2>Редактирование каталогов</h2>

<?php echo $this->Html->link('+ Добавить каталог', array('admin' => true, 'controller' => 'catalogs', 'action' => 'add'), array('class' => 'add-entity-link')); ?>		

		<?php
	
		foreach ($companies as $company) {
			echo '<div class="companies-menu">';
				echo '<a class="company '.$company['Company']['name'].'"></a>';
			echo "</div>";
				foreach ($company['Catalog'] as $catalog) {
					echo "<div class='motolist-item'>";
						echo '<a href="/files/'.$catalog['url'].'" download>'.$catalog['title'].'</a>';
						echo "<div class='motolist-item-desc'>";
							echo $this->Html->link('Редактировать', array('admin'=>true, 'action' => 'edit', $catalog['id']))." | ".
									 $this->Html->link('Удалить', array('admin'=>true, 'action' => 'delete', $catalog['id']), null, 'Модель будет удалена. Вы уверены?');
						
							echo "<div class='clear'></div>"; 
						echo "</div>";
					echo "</div>";
				}
			
			}	
		?>


<br><br>
</div>		
	
	
