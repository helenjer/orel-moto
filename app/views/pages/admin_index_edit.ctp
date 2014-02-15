<?php 
	include("spaw/spaw.inc.php"); 
	$spaw1 = new SpawEditor("spaw1", @$this->data['Page']['text']);
?>
<div class="ca-text">
<h2>Редактирование главной страницы</h2>
<div class="form">
	<?php 
	echo $this->Form->create('Page', array('action' => 'index_edit'));
	echo "<div class='field'>".$this->Form->input('title', array('style'=>'width: 535px;', 'rows' => '1', 'label' => 'Заголовок страницы', 'cols' => "80"))."</div>";
	//echo "<div class='field'>".$this->Form->input('text', array('style'=>'width: 535px;', 'rows' => '10', 'label' => 'Текст', 'cols' => "80"))."</div>";
	//echo "<div class='field'>".$this->Form->input('keywords', array('rows' => '2', 'label' => 'Ключевые слова', 'cols' => "80"))."</div>";
	//echo "<div class='field'>".$this->Form->input('description', array('rows' => '2', 'label' => 'Описание', 'cols' => "80"))."</div>";
	echo "<br>Текст";
	$spaw1->show();
	echo $this->Form->input('id', array('type'=>'hidden')); 
	echo "<div class='field'>".$this->Form->end('Сохранить')."</div>";
	?>
	<div class="clear"></div>
</div>

<div>
<h3> Редактировать описание партнера:</h3>
	<?php
		foreach ($partners as $p) {
			echo $this->Html->link(strtoupper($p['Partner']['name']), array('admin'=>true,'controller' => 'partners', 'action' => 'edit', $p['Partner']['id'])).'<br>';								}
		?>
</div>
<br><br>
<h3> Редактировать новости:</h3>
	<?php
	echo $this->Html->link('Добавить новость', array('admin' => true, 'controller' => 'news', 'action' => 'add'))."<br><br>";
	

		foreach ($news as $n) {
			echo "&laquo;".substr($n['News']['text'],0,30)."...&raquo; (".$n['News']['date'].") - ";
			echo $this->Html->link('Редактировать', array('admin'=>true, 'controller' => 'news', 'action' => 'edit', $n['News']['id']))." | ".
				$this->Html->link('Удалить', array('admin'=>true, 'controller' => 'news',  'action' => 'delete', $n['News']['id']), null, 'Новость будет удалена. Вы уверены?')."<br>";
		}
		?>
</div>

<div class="clear"></div>
</div>