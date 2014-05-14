<?php
	$options_for_type = array('bicycle' => 'Велосипед', 'motochild' => 'Детский транспорт');
	
	$is_bicycle = in_array('bicycle',$this->passedArgs);
  	$is_motochild = in_array('motochild',$this->passedArgs);
	if ($is_bicycle) {
		$options_for_company = array('racer' => 'Racer', 'stels' => 'Stels', 'forward' => 'Forward', 'fury' => 'FURY');
		$options_for_subtype = array('children' => 'Детские', 'folding' => 'Складные', 'road'=>'Дорожные', 'sport' => 'Спортивные', 'two_suspend'=>'Двухподвесы');
	}
	else  if ($is_motochild) {
		$options_for_company = array('racer' => 'Racer');
		$options_for_subtype = array('cars_akkum_radio' => 'Автомобили аккумуляторные с радиоуправлением', 'cars_akkum' => 'Автомобили аккумуляторные', 'motocycle_akkum'=>'Мотоциклы аккумуляторные', 'bicycles_3' => 'Велосипеды трёхколесные с ручкой управления', 'cars'=>'Автомобили');
	}
	else  {
		$options_for_company = array('racer' => 'Racer', 'irbis' => 'Irbis', 'nexus' => 'Nexus Motors', 'hors' => 'HorsMoto');
		$options_for_subtype = array();
	}
?>
<div class="ca-text">  
<h2>Добавление прайс-листа
<?php if ($is_bicycle) echo(' велосипеда');
else if ($is_motochild) echo(' детского транспорта')?>
</h2>
	<div class="form">
		<?php echo $this->Form->create('Motofile', array('enctype' => 'multipart/form-data', 'action' => 'add'));
			if ($is_bicycle|| $is_motochild) {
				if ($is_bicycle) echo $form->input('type', array('type'=>'hidden', 'value' => 'bicycle'));
				if ($is_motochild) echo $form->input('type', array('type'=>'hidden', 'value' => 'motochild'));
			}
				else echo "<div class='field'>".$this->Form->input('type', array('type'=>'select', 'style' => 'width: 200px', 'label'=> 'Тип техники', 'options' =>$options_for_type, 'default'=>'1'))."</div>";
			
			echo "<div class='field'>".$this->Form->input('sub_type', array('type'=>'select', 'style' => 'width: 200px', 'label'=> 'Подтип техники', 'options' =>$options_for_subtype ))."</div>";

			echo "<div class='field'>".$this->Form->input('company', array('type'=>'select', 'style' => 'width: 200px', 'label'=> 'Фирма', 'options' =>$options_for_company))."</div>";
			
			echo "<br><div class='field'>".$this->Form->input('url', array('type' => 'file', 'label'=> 'Файл'))."</div>";
			echo "<div class='field'>".$this->Form->end('Добавить')."</div>";
		?>
	</div><div class="clear"></div>
</div>
