<div class="ca-text">  
<h2>Добавление каталога</h2>
	<div class="form">
		<?php echo $this->Form->create('Catalog', array('enctype' => 'multipart/form-data', 'action' => 'add'));

			echo "<div class='field'>".$this->Form->input('company_id', array('type'=>'select', 'style' => 'width: 200px', 'label'=> 'Фирма'))."</div>";
			echo "<br><div class='field'>".$this->Form->input('title', array( 'style' => 'width: 370px','label'=> 'Название'))."</div>";
			echo "<br><div class='field'>".$this->Form->input('url', array('type' => 'file', 'style' => 'width: 370px', 'label'=> 'Файл'))."</div>";
			echo "<div class='field'>".$this->Form->end('Добавить')."</div>";
		?>
	</div><div class="clear"></div>
</div>
