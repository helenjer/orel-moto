<?php       
       $default_sub_type = "cars_akkum"; 
       if (isset($motochild) && sizeof($motochild) > 0)
	      $sub_type = $motochild[0]['Mototechnic']['sub_type'];
       
       $motochild_subtypes = array('���������� �������������� � ����������������' => 'cars_akkum_radio', '���������� ��������������' => 'cars_akkum', '��������� ��������������'=>'motocycle_akkum', '���������� ����������� � ������ ����������' => 'bicycles_3', '����������'=>'cars');
       
       if (isset($sub_type)) {
	      $this->Html->addCrumb('������� ���������', '/mototechnics/motochild/');
	      $sub_type_name = array_search($sub_type, $motochild_subtypes);
	      if ($sub_type_name) $this->Html->addCrumb($sub_type_name, '');
       } else  $this->Html->addCrumb('������� ���������', '');
?>
       
<h1>������� ���������</h1>
<div class="ca-text">
	<?php
	if ($motochild_index) {
       	      foreach ($motochild_subtypes as $name => $sub_type)
	    	      echo  $this->Html->link($name, array('admin'=> false,'controller' => 'mototechnics', 'action' => 'motochild', $sub_type), array('class'=>'category-link'))."<br>";
	}
	else { ?>
	
	<div class="companies-menu">
	<?php
	
	if (!isset($sub_type))
	      $sub_type = $default_sub_type;
	      
	// + ������ � ������ ��������!!! ������ ���������
        foreach ($companies as $comp) {
			echo "<a href='/mototechnics/motochild/".$sub_type."/".$comp['mototechnics']['company']."' class='company ".$comp['mototechnics']['company']."'></a>";
	} ?>
       </div>
       <div class="strip"></div>

       
       <?php
	  $lastcomp = '';
		$kol=0;
		$cur=0;
		$size = count($motochild);
		foreach ($motochild as $key=>$moto) {
		  $cur++;
		//����� ������ �� ��� ������
			if (!isset($thiscrumb)&&($kol>3)&&
				($lastcomp != $moto['Mototechnic']['company'] || ($size == $cur))) {
			echo "<a href='/mototechnics/motochild/".$sub_type."/".$lastcomp."' class='show-more'>�������� ��� ������ &gt;&gt;</a>";
		     }
		     
		     if ((!isset($thiscrumb))&&($kol<=3)&&
			 ($lastcomp != '' && $lastcomp != $moto['Mototechnic']['company'] /*|| ($size == $cur)*/)) { // �������� ���� ��������
			    if (!empty($motofiles))
			    foreach ($motofiles as $key_f=>$file)
				   if ($file['Motofile']['company'] === $lastcomp) {
					  echo '<a href="/files/'.$file['Motofile']['url'].'">'.'������ ������ �������� ���������� '.ucfirst($lastcomp).'</a>';
					  break;
				   }
		     }
		     
		     
		  if ($lastcomp != $moto['Mototechnic']['company']) {
			  echo "<h2 class='company ".$moto['Mototechnic']['company']."'>"."</h2>";
			  $lastcomp = $moto['Mototechnic']['company'];
				$kol=0;
			}
		     
			$kol++;
			if (!isset($thiscrumb)&&($kol<=3) || isset($thiscrumb)) { // ���� �������� �� �������, �������� ������ 3 - ���� ������� ���
			 echo "<div class='motolist-item'>";
				
			 echo "<div class='mi-left'>";
					echo "<a href='/mototechnics/view/".$moto['Mototechnic']['id']."' class='mil-link'>";
							// check if new added model
						if ($moto['Mototechnic']['is_new']) echo "<span class='icon-new'></span>";
						
						if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "</a>";
			 if (!empty($moto['Mototechnic']['price'])) echo '<div class="price"> ����: <span>'.$moto['Mototechnic']['price'].' ���.</span></div>';
			 if (!empty($moto['Mototechnic']['presence'])) echo '<div class="presence"><span>'.$moto['Mototechnic']['presence'].'</span></div>';			
		    
			 echo "</div>";
					
					
					echo "<h3>".$this->Html->link($moto['Mototechnic']['model'], array('admin'=> false,'controller' => 'mototechnics', 'action' => 'view', $moto['Mototechnic']['id']))."</h3>";
					echo "<div class='motolist-item-desc'>".$moto['Mototechnic']['short_txt']."</div>";
					echo "<a href='/mototechnics/view/".$moto['Mototechnic']['id']."' class='btn-more'></a>";
					echo "<div class='clear'></div>";
			 
				echo "</div>";
				
				
				
			};
			
			
		     if ((!isset($thiscrumb))&&($kol<=3)&&($size == $cur)) { // �������� ���� ��������
			    if (!empty($motofiles))
			    foreach ($motofiles as $key_f=>$file)
				   if ($file['Motofile']['company'] === $lastcomp) {
					  echo '<a href="/files/'.$file['Motofile']['url'].'">'.'������ ������ �������� ���������� '.ucfirst($lastcomp).'</a>';
					  break;
				   }
		     }     
			     
		     if (isset($thiscrumb)&&($size == $cur)) {//�������� �������� 
			    if (!empty($motofiles))
				   echo '<a href="/files/'.$motofiles['Motofile']['url'].'">'.'������ ������ �������� ���������� '.ucfirst($moto['Mototechnic']['company']).'</a>';
		     }
			
		}
		
	}
	?>	
</div>
