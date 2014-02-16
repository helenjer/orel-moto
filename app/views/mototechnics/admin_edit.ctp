<?php
	include("spaw/spaw.inc.php"); 
	$spaw1 = new SpawEditor("spaw1", @$this->data['Mototechnic']['short_txt']);	
	$spaw2 = new SpawEditor("spaw2", @$this->data['Mototechnic']['full_txt']);
	$spaw3 = new SpawEditor("spaw3", @$this->data['Mototechnic']['sub_txt']);
	$spaw4 = new SpawEditor("spaw4", @$this->data['Mototechnic']['video_txt']);
	$spaw3->height = '150px';
	$spaw4->height = '150px'; 
	$options_for_type = array('scooter' => '������', 'moped' => '�����', 'motoroller'=>'����������', 'motorcycle' => '��������', 'quadrocycle' => '����������','snow' => '���������');
	//$options_for_company = array('omaks' => 'Omaks', 'hors' => 'HorsMoto', 'yamasaki' => 'Yamasaki', 'racer' => 'Racer', 'irbis' => 'Irbis', 'eurotex' => 'Eurotex', 'nexus' => 'Nexus Motors');
  	$is_bicycle = in_array('bicycle',$this->passedArgs);
	$is_motochild = in_array('motochild',$this->passedArgs);
	if ($is_bicycle) {
		$options_for_company = array('racer' => 'Racer', 'stels' => 'Stels', 'forward' => 'Forward');
		$options_for_subtype = array('children' => '�������', 'folding' => '��������', 'road'=>'��������', 'sport' => '����������', 'two_suspend'=>'�����������');
	}
	else  if ($is_motochild) {
		$options_for_company = array('racer' => 'Racer');
		$options_for_subtype = array('cars_akkum_radio' => '���������� �������������� � ����������������', 'cars_akkum' => '���������� ��������������', 'motocycle_akkum'=>'��������� ��������������', 'bicycles_3' => '���������� ����������� � ������ ����������', 'cars'=>'����������');
	}
	else  $options_for_company = array('racer' => 'Racer', 'irbis' => 'Irbis', 'nexus' => 'Nexus Motors', 'hors' => 'HorsMoto', 'abm' => '���', 'xmoto' => 'X Moto', 'eurotex' => 'Eurotex');
?>
<div class="ca-text">  
<h2>�������������� ������
<?php if ($is_bicycle) echo(' ����������');
else if ($is_motochild) echo(' �������� ����������')?>
</h2>
	<div class="form">
		<?php echo $this->Form->create('Mototechnic', array('enctype' => 'multipart/form-data', 'action' => 'edit'));
			if ($is_bicycle || $is_motochild) {
				if ($is_bicycle) echo $form->input('type', array('type'=>'hidden', 'value' => 'bicycle'));
				if ($is_motochild) echo $form->input('type', array('type'=>'hidden', 'value' => 'motochild'));
				echo "<div class='field'>".$this->Form->input('sub_type', array('type'=>'select', 'style' => 'width: 200px', 'label'=> '������', 'options' =>$options_for_subtype, 'default'=>'1'))."</div>";
			}
				else  echo "<div class='field'>".$this->Form->input('type', array('type'=>'select', 'style' => 'width: 200px', 'label'=> '��� �����������', 'options' =>$options_for_type))."</div>";
			echo "<div class='field'>".$this->Form->input('company', array('type'=>'select', 'style' => 'width: 200px', 'label'=> '�����', 'options' =>$options_for_company))."</div>";
			if ($is_bicycle || $is_motochild) echo $form->input('weight', array('type'=>'hidden', 'value' => '0'));
				else echo "<div class='field'>".$this->Form->input('weight', array('style' => 'width: 200px', 'label'=> '��� (*��� ����������)'))."</div>";
			echo "<div class='field'>".$this->Form->input('model', array( 'style' => 'width: 300px','label'=> '������������ ������'))."</div>";
			echo "<br>������� ��������"; $spaw1->show();
			echo "<br>��������� ��������"; $spaw2->show();
			echo "<br><br>�������� ����������� ������ (��� ����������)"; $spaw3->show();
			echo "<br><br><div class='field'>".$this->Form->input('price', array( 'style' => 'width: 150px','label'=> '���� ������ (���.)'))."</div>";
			echo "<div class='field'>".$this->Form->input('presence', array( 'style' => 'width: 270px','label'=> '�������'))."</div>";
			echo "<br><div class='field'>".$this->Form->input('img', array('type' => 'file', 'label'=> '�����������'))."</div>";
			echo "<br><div class='field'>".$this->Form->input('is_new', array('type'=>'checkbox', 'style' => '','label'=> '����� ������'))."</div>";
			echo "<div class='field'>".$this->Form->input('date_add', array('label'=> '����'))."</div>";
			if (!$is_bicycle && !$is_motochild) {
				//echo "<br><br>�����"; $spaw4->show();
				echo "<br><br><h2>�����</h2>";
				$i = 0;
				
					foreach ($this->data["Video"] as $video) {
						if (isset($video['img']) || $video['url'] || $video['File']['tmp_name']) {
							echo "<div class='add-video-block' data-id='".$i."'>";
								echo $this->Form->hidden('Video.'.$i.'.id');
								if (isset($video['img'])) {
									echo "<br><div class='field'><label>".($i+1).". �������� (.jpg, .png, .gif)</label>";
									echo $html->image($video['img'], array('class' => 'video-img-preview'));
									echo "<div class='clear'></div>";
									echo "</div>";
								}
									else echo "<div class='field'>".$this->Form->input('Video.'.$i.'.File', array('type' => 'file', 'style' => 'width: 300px', 'label'=> '�������� (.jpg, .png, .gif)'))."</div>";
								echo "<div class='field'>".$this->Form->input('Video.'.$i.'.url', array('type' => 'text', 'style' => 'width: 300px', 'label'=> 'URL �����'))."</div>";
								echo "<div class='field'><a href='#' class='admin-link' data-role='del-video-link'>�������</a></div>";
							echo "</div>";
						}
						$i++;
					}
					
					echo "<div class='add-video-block' data-id='".$i."' style='display: none'>";
						echo "<div class='field'>".$this->Form->input('Video.'.$i.'.File', array('type' => 'file', 'style' => 'width: 300px', 'label'=> '�������� (.jpg, .png, .gif)'))."</div>";
						echo "<div class='field'>".$this->Form->input('Video.'.$i.'.url', array('type' => 'text', 'style' => 'width: 300px', 'label'=> 'URL �����'))."</div>";
						echo "<div class='field'><a href='#' class='admin-link' data-role='del-video-link'>�������</a></div>";
					echo "</div>";
				}

				echo "<div class='field'><a href='#' class='admin-link' data-role='add-video-link'>�������� ��� 1 �����</a></div>";
			
			
			echo $form->input('id', array('type'=>'hidden')); 
			echo "<div class='field'>".$this->Form->end('���������')."</div>";
		?>
	</div><div class="clear"></div>
</div>
