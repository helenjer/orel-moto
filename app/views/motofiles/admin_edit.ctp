<?php
	$options_for_type = array('bicycle' => '���������', 'motochild' => '������� ���������');
	
	function get_sel_index ($arr, $param_arr) {
		// ��������� �������� ��� ���������� select -> ������� � ������� (param1 = ������) ������� �����, ������� � ��� ��. �����!!!!
		$i = 1;
		$n = 1;
		foreach ($arr as $k => $v) { //������ ������ ��� ����������� � select �������� �� ����
			if ($k == $param_arr ) {
				$n = $i;
			}
			$i++;
		}
		return $n;
	}
	
	
  	$is_bicycle = $this->data['Motofile']['type'] == 'bicycle';
	$is_motochild = $this->data['Motofile']['type'] == 'motochild';
	if ($is_bicycle) {
		$options_for_company = array('racer' => 'Racer', 'stels' => 'Stels', 'stark' => 'Stark', 'fury' => 'FURY');
		$options_for_subtype = array('children' => '�������', 'folding' => '��������', 'road'=>'��������', 'sport' => '����������', 'two_suspend'=>'�����������');
		}
	else if ($is_motochild) {
		$options_for_company = array('racer' => 'Racer');
		$options_for_subtype = array('cars_akkum_radio' => '���������� �������������� � ����������������', 'cars_akkum' => '���������� ��������������', 'motocycle_akkum'=>'��������� ��������������', 'bicycles_3' => '���������� ����������� � ������ ����������', 'cars'=>'����������');
	}
	 else {
		$options_for_company = array('racer' => 'Racer', 'irbis' => 'Irbis', 'nexus' => 'Nexus Motors', 'hors' => 'HorsMoto');
		$options_for_subtype = array();
	}
?>
<div class="ca-text">  
<h2>�������������� �����-�����
<?php if ($is_bicycle) echo(' ����������');
else if ($is_motochild) echo(' �������� ����������')?>
</h2>
	<div class="form">
		<?php echo $this->Form->create('Motofile', array('enctype' => 'multipart/form-data', 'action' => 'edit'));
			
			echo "<div class='field'>".$this->Form->input('type', array('type'=>'select', 'style' => 'width: 200px', 'label'=> '��� �������', 'options' =>$options_for_type, 'default'=> get_sel_index($options_for_type, $this->data['Motofile']['type'])))."</div>";
			
			echo "<div class='field'>".$this->Form->input('sub_type', array('type'=>'select', 'style' => 'width: 200px', 'label'=> '������ �������', 'options' =>$options_for_subtype ))."</div>";

			echo "<div class='field'>".$this->Form->input('company', array('type'=>'select', 'style' => 'width: 200px', 'label'=> '�����', 'options' =>$options_for_company))."</div>";
			
			echo "<br><div class='field'>".$this->Form->input('url', array('type' => 'file', 'label'=> '����'))."</div>";
			
			echo "<div class='field'>".$this->Form->input('date_add', array('label'=> '����'))."</div>";
			echo $form->input('id', array('type'=>'hidden')); 
			echo "<div class='field'>".$this->Form->end('���������')."</div>";
		?>
	</div><div class="clear"></div>
</div>
