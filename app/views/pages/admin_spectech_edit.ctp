<?php 
	include("spaw/spaw.inc.php"); 
	$spaw1 = new SpawEditor("spaw1", @$this->data['Page']['text']);
?>
<div class="ca-text">
<h2>Редактирование страницы "Спецтехника"</h2>
<div class="form">
	<?php 
	echo $this->Form->create('Page', array('action' => 'spectech_edit'));
	echo "<div class='field'>".$this->Form->input('title', array('style'=>'width: 535px;', 'rows' => '1', 'label' => 'Заголовок страницы', 'cols' => "80"))."</div>";
	echo "<br>Текст";
	$spaw1->show();
	echo $this->Form->input('id', array('type'=>'hidden')); 
	echo "<div class='field'>".$this->Form->end('Сохранить')."</div>";
	?>
	<div class="clear"></div>
</div>
<div class="clear"></div>
</div>