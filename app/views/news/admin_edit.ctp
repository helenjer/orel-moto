<?php
	include("spaw/spaw.inc.php"); 
	$spaw1 = new SpawEditor("spaw1", @$this->data['News']['text']);	
?>
<div class="ca-text">  
<h2>Редактирование новости</h2>
	<div class="form">
		<?php echo $this->Form->create('News', array('action' => 'edit'));
			echo "Текст новости"; $spaw1->show();
			echo "<br><div class='field'>".$this->Form->input('date', array('label'=> 'Дата'))."</div>";
			echo $form->input('id', array('type'=>'hidden')); 
			echo "<div class='field'>".$this->Form->end('Сохранить')."</div>";
		?>
	</div><div class="clear"></div>
</div>
