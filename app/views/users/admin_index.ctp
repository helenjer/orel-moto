<div class="ca-text">  
<ul class="admin-list">
<?php 
        echo "<li>".$this->Html->link('Главная', array('admin' => true, 'controller' => 'pages', 'action' => 'index_edit', $idindex['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('Мототехника', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'index'/*, $idpartners['Page']['id']*/))."</li>";
	echo "<li>".$this->Html->link('Запчасти и аксессуары', array('admin' => true, 'controller' => 'pages', 'action' => 'details_edit', $iddetails['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('Велосипеды', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'bicycles_index'))."</li>";
	echo "<li>".$this->Html->link('Товары для спорта', array('admin' => true, 'controller' => 'pages', 'action' => 'forsport_edit', $idforsport['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('Спецтехника', array('admin' => true, 'controller' => 'pages', 'action' => 'spectech_edit', $idspectech['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('Детский транспорт', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'motochild_index'))."</li>";
	echo "<li>".$this->Html->link('Лодочные моторы', array('admin' => true, 'controller' => 'pages', 'action' => 'boatmotors_edit', $idboatmotors['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('Сервисный центр', array('admin' => true, 'controller' => 'pages', 'action' => 'service_edit', $idservice['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('Галерея', array('admin' => true, 'controller' => 'pages', 'action' => 'gallery_edit', $idgallery['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('Каталоги', array('admin' => true, 'controller' => 'catalogs', 'action' => 'admin_index', $idcatalogs['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('Контакты', array('admin' => true, 'controller' => 'pages', 'action' => 'contacts_edit', $idcontacts['Page']['id']))."</li>";
  //echo "<li>".$this->Html->link('Главная страница', array('admin' => true, 'controller' => 'pages', 'action' => 'index_meta'/*, $idindex['Page']['id']*/))."</li>";
?>
</ul>

</div>