<?php  $this->Html->addCrumb('Мототехника', ''); 
			 if (isset($thiscrumb)) $link = '/mototechnics/scooters/'; else $link='';
       $this->Html->addCrumb('Скутеры', $link); ?>
<h1>Скутеры</h1>
<div class="ca-text">
<div class="companies-menu">
	<?php 
		foreach ($companies as $comp) {
			echo "<a href='/mototechnics/scooters/".$comp['mototechnics']['company']."' class='company ".$comp['mototechnics']['company']."'></a>";
	} ?>
</div>
<div class="strip"></div>
	<?php 
	  $lastcomp = '';
		$kol=0;
		$cur=0;
		$size = count($scooters);
		foreach ($scooters as $key=>$moto) {		
			
			
		  $cur++; 
			//вывод ссылки на все модели
			if (!isset($thiscrumb)&&($kol>3)&&  
				($lastcomp != $moto['Mototechnic']['company'] || ($size == $cur))) {
						echo "<a href='/mototechnics/scooters/".$lastcomp."' class='show-more'>Показать все модели </a><br>";
			}
			
			if (!isset($thiscrumb)&&  
				($lastcomp != $moto['Mototechnic']['company'] || ($size == $cur))) {
						if (!empty($company_info[$cur-2]) && !empty($company_info[$cur-2]['Catalog'])) echo $this->Html->link('Полный каталог моделей '.$company_info[$cur-2]['Company']['title'], array('admin'=>false, 'controller' => 'catalogs', 'action' => '?company='.$company_info[$cur-2]['Company']['name']), array('class' => 'show-catalog' )).'<br><br>';
			}

		 if ($lastcomp != $moto['Mototechnic']['company']) {	
        echo "<h2 class='company ".$moto['Mototechnic']['company']."' id='".$moto['Mototechnic']['company']."'>"."</h2>";
			  $lastcomp = $moto['Mototechnic']['company'];
				$kol=0;
			}
			$kol++;
			if (!isset($thiscrumb)&&($kol<=3) || isset($thiscrumb)) { // если компания не выбрана, показать только 3 - если выбрана все
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
			
			if ($kol == $size) {
				if (!empty($company_info[$kol-1]) && !empty($company_info[$kol-1]['Catalog'])) echo $this->Html->link('Полный каталог моделей '.$company_info[$kol-1]['Company']['title'], array('admin'=>false, 'controller' => 'catalogs', 'action' => '?company='.$company_info[$kol-1]['Company']['name']), array('class' => 'show-catalog' ));
			}

		}
	?>	
</div>