<div class="ca-text mototech-admin"> 
<h2>�������������� �������� ����������</h2>

<?php echo $this->Html->link('+ �������� ������', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'add', 'motochild'), array('class' => 'add-entity-link'))."<br />"; ?>		
<?php echo $this->Html->link('�������� �����-����', array('admin' => true, 'controller' => 'motofiles', 'action' => 'add', 'motochild'))."<br /><br />"; ?>
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

<?php echo $this->Mototech->categoriesAnchorList($models); ?>

<?php foreach ($models as $type => $list) {
			echo "<h2 id='".$type."'>".$this->Mototech->typeName($type, 1)."</h2>";
			foreach ($list['models'] as $moto)  {
				echo "<div class='motolist-item'>";
					if (!empty($moto['Mototechnic']['img'])) echo $html->image($moto['Mototechnic']['img']);
						else echo $html->image('logo.png');
					echo "<h3>".$moto['Mototechnic']['model']."</h3>";
					echo "<div>����: "; if (!empty($moto['Mototechnic']['price'])) echo "<b>".$moto['Mototechnic']['price']." ���.</b>"; else echo "--"; echo "</div>";
					echo "<div>�������: "; if (!empty($moto['Mototechnic']['presence'])) echo "<b>".$moto['Mototechnic']['presence']."</b>"; else echo "--"; echo "</div>";

					echo "<div class='motolist-item-desc'>";
						echo $this->Html->link('�������������', array('admin'=>true, 'action' => 'edit', $moto['Mototechnic']['id']))." | ".
								 $this->Html->link('�������', array('admin'=>true, 'action' => 'delete', $moto['Mototechnic']['id']), null, '������ ����� �������. �� �������?');
					echo "</div>";
					echo "<div class='clear'></div>"; 
				echo "</div>";
				}
				
				show_motofiles($list['files'], $this);
			}
	?>
		
		<?php // echo "<br>".$this->Html->link("������������� �������� �������� �����������", array('admin' => true, 'controller' => 'mototechnics', 'action' => 'mototechnics_meta'/*, $idmeta['Page']['id']*/)); 
		?>

<br><br>
</div>		
	
	
