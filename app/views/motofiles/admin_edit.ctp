<?php
	$options_for_type = array('bicycle' => 'Велосипед', 'motochild' => 'Детский транспорт');
	
	function get_sel_index ($arr, $param_arr) {
		// получение индексов для заполнения select -> вынести в функцию (param1 = массив) возвращ номер, сдклать и для др. полей!!!!
		$i = 1;
		$n = 1;
		foreach ($arr as $k => $v) { //узнать индекс для простановки в select значения из базы
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
		$options_for_subtype = array('children' => 'Детские', 'folding' => 'Складные', 'road'=>'Дорожные', 'sport' => 'Спортивные', 'two_suspend'=>'Двухподвесы');
		}
	else if ($is_motochild) {
		$options_for_company = array('racer' => 'Racer');
		$options_for_subtype = array('cars_akkum_radio' => 'Автомобили аккумуляторные с радиоуправлением', 'cars_akkum' => 'Автомобили аккумуляторные', 'motocycle_akkum'=>'Мотоциклы аккумуляторные', 'bicycles_3' => 'Велосипеды трёхколесные с ручкой управления', 'cars'=>'Автомобили');
	}
	 else {
		$options_for_company = array('racer' => 'Racer', 'irbis' => 'Irbis', 'nexus' => 'Nexus Motors', 'hors' => 'HorsMoto');
		$options_for_subtype = array();
	}
?>
<div class="ca-text">  
<h2>Редактирование прайс-листа
<?php if ($is_bicycle) echo(' велосипеда');
else if ($is_motochild) echo(' детского транспорта')?>
</h2>
	<div class="form">
		<?php echo $this->Form->create('Motofile', array('enctype' => 'multipart/form-data', 'action' => 'edit'));
			
			echo "<div class='field'>".$this->Form->input('type', array('type'=>'select', 'style' => 'width: 200px', 'label'=> 'Тип техники', 'options' =>$options_for_type, 'default'=> get_sel_index($options_for_type, $this->data['Motofile']['type'])))."</div>";
			
			echo "<div class='field'>".$this->Form->input('sub_type', array('type'=>'select', 'style' => 'width: 200px', 'label'=> 'Подтип техники', 'options' =>$options_for_subtype ))."</div>";

			echo "<div class='field'>".$this->Form->input('company', array('type'=>'select', 'style' => 'width: 200px', 'label'=> 'Фирма', 'options' =>$options_for_company))."</div>";
			
			echo "<br><div class='field'>".$this->Form->input('url', array('type' => 'file', 'label'=> 'Файл'))."</div>";
			
			echo "<div class='field'>".$this->Form->input('date_add', array('label'=> 'Дата'))."</div>";
			echo $form->input('id', array('type'=>'hidden')); 
			echo "<div class='field'>".$this->Form->end('Сохранить')."</div>";
		?>
	</div><div class="clear"></div>
</div>
