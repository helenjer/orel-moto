<?php       
       $default_sub_type = "road"; // вынести в контроллер передачу типа по умолчанию?!!!
       if (isset($bicycles) && sizeof($bicycles) > 0)
	      $sub_type = $bicycles[0]['Mototechnic']['sub_type']; // вынести в контроллер передачу типа?!!!
       
       $bicycle_subtypes = array('Детские' => 'children', 'Складные' => 'folding', 'Дорожные'=>'road', 'Спортивные' => 'sport', 'Двухподвесы'=>'two_suspend');
       
       if (isset($sub_type)) {
	      $this->Html->addCrumb('Велосипеды', '/mototechnics/bicycles/');
	      $sub_type_name = array_search($sub_type, $bicycle_subtypes);
	      if ($sub_type_name) $this->Html->addCrumb($sub_type_name, '');
       } else  $this->Html->addCrumb('Велосипеды', '');
?>
       
<h1>Велосипеды</h1>
<div class="ca-text">
	<?php
	if ($bicycle_index) {
       	      foreach ($bicycle_subtypes as $name => $sub_type)
	    	      echo  $this->Html->link($name, array('admin'=> false,'controller' => 'mototechnics', 'action' => 'bicycles', $sub_type), array('class'=>'category-link'))."<br>";
	}
	else { ?>
	
	<div class="companies-menu">
	<?php
	
	if (!isset($sub_type))
	      $sub_type = $default_sub_type;
	      
	// + подтип в ссылку передать!!! передд компанией
        foreach ($companies as $comp) {
			echo "<a href='/mototechnics/bicycles/".$sub_type."/".$comp['mototechnics']['company']."' class='company ".$comp['mototechnics']['company']."'></a>";
	} ?>
       </div>
       <div class="strip"></div>

       
       <?php
	  $lastcomp = '';
		$kol=0;
		$cur=0;
		$size = count($bicycles);
		foreach ($bicycles as $key=>$moto) {
		  $cur++;
			//вывод ссылки на все модели
			if (!isset($thiscrumb)&&($kol>3)&&  
				($lastcomp != $moto['Mototechnic']['company'] || ($size == $cur))) {
						echo "<a href='/mototechnics/bicycles/".$lastcomp."' class='show-more'>Показать все модели </a><br>";
			}
			
			if (!isset($thiscrumb)&&  
				($lastcomp != $moto['Mototechnic']['company'] || ($size == $cur))) {
						if (!empty($company_info[$cur-2]) && !empty($company_info[$cur-2]['Catalog'])) echo $this->Html->link('Полный каталог моделей '.$company_info[$cur-2]['Company']['title'], array('admin'=>false, 'controller' => 'catalogs', 'action' => '?company='.$company_info[$cur-2]['Company']['name']), array('class' => 'show-catalog' )).'<br><br>';
			}
		     
		     if ((!isset($thiscrumb))&&($kol<=3)&&
			 ($lastcomp != '' && $lastcomp != $moto['Mototechnic']['company'] || ($size == $cur))) { // страница всех компаний
			    if (!empty($motofiles))
			    foreach ($motofiles as $key_f=>$file)
				   if ($file['Motofile']['company'] === $lastcomp) {
					  echo '<a href="/files/'.$file['Motofile']['url'].'">'.'Полный список велосипедов '.ucfirst($lastcomp).'</a><br>';
					  break;
				   }
		     }
		     
		     
		  if ($lastcomp != $moto['Mototechnic']['company']) {
			  echo "<h2 class='company ".$moto['Mototechnic']['company']."'>"."</h2>";
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
			
			
		     if ((!isset($thiscrumb))&&($kol<=3)&&($size == $cur)) { // страница всех компаний
			    if (!empty($motofiles))
			    foreach ($motofiles as $key_f=>$file)
				   if ($file['Motofile']['company'] === $lastcomp) {
					  echo '<a href="/files/'.$file['Motofile']['url'].'">'.'Полный список велосипедов '.ucfirst($lastcomp).'</a><br>';
					  break;
				   }
		     }     
			     
		     if (isset($thiscrumb)&&($size == $cur)) {//страница компании 
			    if (!empty($motofiles))
				   echo '<a href="/files/'.$motofiles['Motofile']['url'].'">'.'Полный список велосипедов '.ucfirst($moto['Mototechnic']['company']).'</a>';
		     }
			
		}
			if ($kol == $size) {
				if (!empty($company_info[$kol-1]) && !empty($company_info[$kol-1]['Catalog'])) echo $this->Html->link('Полный каталог моделей '.$company_info[$kol-1]['Company']['title'], array('admin'=>false, 'controller' => 'catalogs', 'action' => '?company='.$company_info[$kol-1]['Company']['name']), array('class' => 'show-catalog' ));
			}
		
	}
	?>	
</div>
