<?php
	include("spaw/spaw.inc.php"); 
	$spaw1 = new SpawEditor("spaw1", @$this->data['News']['text']);	
?>
<div class="ca-text">  
<h2>�������������� �������</h2>
	<div class="form">
		<?php echo $this->Form->create('News', array('action' => 'edit'));
			echo "����� �������"; $spaw1->show();
			echo "<br><div class='field'>".$this->Form->input('date', array('label'=> '����'))."</div>";
			echo $form->input('id', array('type'=>'hidden')); 
			echo "<div class='field'>".$this->Form->end('���������')."</div>";
		?>
	</div><div class="clear"></div>
</div>
