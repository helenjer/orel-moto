<?php 
	include("spaw/spaw.inc.php"); 
	$spaw1 = new SpawEditor("spaw1", @$this->data['Partner']['text']);	
?>
<div class="ca-text">  
<h2>�������������� ��������</h2>
	<div class="form">
		<?php echo $this->Form->create('Partner', array('enctype' => 'multipart/form-data', 'action' => 'edit'));
			echo "<br>�������� ��������"; $spaw1->show();
			echo "<br><div class='field'>".$this->Form->input('is_on_main_page', array('type'=>'checkbox', 'label'=> '���������� �� ������� ��������'))."</div>";
			echo $form->input('id', array('type'=>'hidden')); 
			echo "<div class='field'>".$this->Form->end('���������')."</div>";
		?>
	</div><div class="clear"></div>
</div>
