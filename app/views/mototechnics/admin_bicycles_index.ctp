<div class="ca-text mototech-admin"> 
<h2>�������������� �����������</h2>

<?php echo $this->Html->link('�������� ������', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'add', 'bicycle'))."<br />"; ?>		
<?php echo $this->Html->link('�������� �����-����', array('admin' => true, 'controller' => 'motofiles', 'action' => 'add', 'bicycle'))."<br /><br />"; ?>
<?php 
function show_motofiles ($files_arr, $this_) {
	if (!empty($files_arr)) {
		echo "<b><ins>����� �����-������*</ins></b> | ".sizeof($files_arr)." ����(�,��)<br>";
		foreach ($files_arr as $moto) {
		echo "<b>".$moto['Motofile']['company']."</b>: ".$moto['Motofile']['url']."<br> ".
			$this_->Html->link('�������������', array('controller' => 'motofiles', 'admin'=>true, 'action' => 'edit', $moto['Motofile']['id'],  $moto['Motofile']['type']))." | ".
			$this_->Html->link('�������', array('controller' => 'motofiles','admin'=>true, 'action' => 'delete', $moto['Motofile']['id']), null, '���� ����� ������. �� �������?')."<br>";
		}
		echo "<small class='notice-txt'>*�� ����� ����������� ��������� �� ���� ���������� ���� � ������ ������ �����</small><br>";
	}

}
?>


		<h2>�������</h2>
		<?php
			foreach ($children as $moto) {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>����: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." ���.</b>"; else echo "--"; echo "</div>";
					echo "<div>�������: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";

					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('�������������', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id'],  $moto['Mototechnic']['type']))." | ".
								 $this->Html->link('�������', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, '������ ����� �������. �� �������?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>"; 
			}
			
			show_motofiles($motofiles_children, $this);
			
		?>
		
		<br>
		<h2>��������</h2>
		<?php
			foreach ($folding as $moto) {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>����: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." ���.</b>"; else echo "--"; echo "</div>";
					echo "<div>�������: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";
					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('�������������', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id'],  $moto['Mototechnic']['type']))." | ".
								 $this->Html->link('�������', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, '������ ����� �������. �� �������?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>"; 
			}
			
			show_motofiles($motofiles_folding, $this);
			
		?>
		
		<br>
		<h2>��������</h2>
		<?php
			foreach ($road as $moto) {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>����: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." ���.</b>"; else echo "--"; echo "</div>";
					echo "<div>�������: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";
					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('�������������', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id'],  $moto['Mototechnic']['type']))." | ".
								 $this->Html->link('�������', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, '������ ����� �������. �� �������?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>"; 
			}
			
			show_motofiles($motofiles_road, $this);
		?>
		
		<br>
		<h2>����������</h2>
		<?php
			foreach ($sport as $moto) {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>����: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." ���.</b>"; else echo "--"; echo "</div>";
					echo "<div>�������: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";
					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('�������������', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id'], $moto['Mototechnic']['type']))." | ".
								 $this->Html->link('�������', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, '������ ����� �������. �� �������?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>"; 
			}
			
			show_motofiles($motofiles_sport, $this);
		?>
		
		<br>
		<h2>�������������</h2>
		<?php
			foreach ($two_suspend as $moto) {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>����: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." ���.</b>"; else echo "--"; echo "</div>";
					echo "<div>�������: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";
					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('�������������', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id'], $moto['Mototechnic']['type']))." | ".
								 $this->Html->link('�������', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, '������ ����� �������. �� �������?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>"; 
			}
			
			show_motofiles($motofiles_two_suspend, $this);
		?>
		

		
		<?php // echo "<br>".$this->Html->link("������������� �������� �������� �����������", array('admin' => true, 'controller' => 'mototechnics', 'action' => 'mototechnics_meta'/*, $idmeta['Page']['id']*/)); 
		?>

<br><br>
</div>		
	
	
