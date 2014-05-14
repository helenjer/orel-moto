<?php
	$options_for_type = array('bicycle' => '���������', 'motochild' => '������� ���������');
	
	$is_bicycle = in_array('bicycle',$this->passedArgs);
  	$is_motochild = in_array('motochild',$this->passedArgs);
	if ($is_bicycle) {
		$options_for_company = array('racer' => 'Racer', 'stels' => 'Stels', 'forward' => 'Forward', 'fury' => 'FURY');
		$options_for_subtype = array('children' => '�������', 'folding' => '��������', 'road'=>'��������', 'sport' => '����������', 'two_suspend'=>'�����������');
	}
	else  if ($is_motochild) {
		$options_for_company = array('racer' => 'Racer');
		$options_for_subtype = array('cars_akkum_radio' => '���������� �������������� � ����������������', 'cars_akkum' => '���������� ��������������', 'motocycle_akkum'=>'��������� ��������������', 'bicycles_3' => '���������� ����������� � ������ ����������', 'cars'=>'����������');
	}
	else  {
		$options_for_company = array('racer' => 'Racer', 'irbis' => 'Irbis', 'nexus' => 'Nexus Motors', 'hors' => 'HorsMoto');
		$options_for_subtype = array();
	}
?>
<div class="ca-text">  
<h2>���������� �����-�����
<?php if ($is_bicycle) echo(' ����������');
else if ($is_motochild) echo(' �������� ����������')?>
</h2>
	<div class="form">
		<?php echo $this->Form->create('Motofile', array('enctype' => 'multipart/form-data', 'action' => 'add'));
			if ($is_bicycle|| $is_motochild) {
				if ($is_bicycle) echo $form->input('type', array('type'=>'hidden', 'value' => 'bicycle'));
				if ($is_motochild) echo $form->input('type', array('type'=>'hidden', 'value' => 'motochild'));
			}
				else echo "<div class='field'>".$this->Form->input('type', array('type'=>'select', 'style' => 'width: 200px', 'label'=> '��� �������', 'options' =>$options_for_type, 'default'=>'1'))."</div>";
			
			echo "<div class='field'>".$this->Form->input('sub_type', array('type'=>'select', 'style' => 'width: 200px', 'label'=> '������ �������', 'options' =>$options_for_subtype ))."</div>";

			echo "<div class='field'>".$this->Form->input('company', array('type'=>'select', 'style' => 'width: 200px', 'label'=> '�����', 'options' =>$options_for_company))."</div>";
			
			echo "<br><div class='field'>".$this->Form->input('url', array('type' => 'file', 'label'=> '����'))."</div>";
			echo "<div class='field'>".$this->Form->end('��������')."</div>";
		?>
	</div><div class="clear"></div>
</div>
