<?php 
	include("spaw/spaw.inc.php"); 
	$spaw1 = new SpawEditor("spaw1", @$this->data['Page']['text']);
?>
<div class="ca-text">
<h2>�������������� ���������� ����������</h2>
<div class="form">
	<?php 
	echo $this->Form->create('Page', array('action' => 'contacts_edit'));
	echo "<div class='field'>".$this->Form->input('title', array('style'=>'width: 535px;', 'rows' => '1', 'label' => '��������� ��������', 'cols' => "80"))."</div>";
	//echo "<div class='field'>".$this->Form->input('text', array('style'=>'width: 535px;', 'rows' => '10', 'label' => '�����', 'cols' => "80"))."</div>";
	//echo "<div class='field'>".$this->Form->input('keywords', array('rows' => '2', 'label' => '�������� �����', 'cols' => "80"))."</div>";
	//echo "<div class='field'>".$this->Form->input('description', array('rows' => '2', 'label' => '��������', 'cols' => "80"))."</div>";
	echo "<br>�����";
	$spaw1->show();
	echo $this->Form->input('id', array('type'=>'hidden')); 
	echo "<div class='field'>".$this->Form->end('���������')."</div>";
	?>
	<div class="clear"></div>
</div>
<div class="clear"></div>
</div>