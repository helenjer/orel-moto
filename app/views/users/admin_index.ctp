<div class="ca-text">  
<ul class="admin-list">
<?php 
        echo "<li>".$this->Html->link('�������', array('admin' => true, 'controller' => 'pages', 'action' => 'index_edit', $idindex['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('�����������', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'index'/*, $idpartners['Page']['id']*/))."</li>";
	echo "<li>".$this->Html->link('�������� � ����������', array('admin' => true, 'controller' => 'pages', 'action' => 'details_edit', $iddetails['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('����������', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'bicycles_index'))."</li>";
	echo "<li>".$this->Html->link('������ ��� ������', array('admin' => true, 'controller' => 'pages', 'action' => 'forsport_edit', $idforsport['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('�����������', array('admin' => true, 'controller' => 'pages', 'action' => 'spectech_edit', $idspectech['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('������� ���������', array('admin' => true, 'controller' => 'mototechnics', 'action' => 'motochild_index'))."</li>";
	echo "<li>".$this->Html->link('�������� ������', array('admin' => true, 'controller' => 'pages', 'action' => 'boatmotors_edit', $idboatmotors['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('��������� �����', array('admin' => true, 'controller' => 'pages', 'action' => 'service_edit', $idservice['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('�������', array('admin' => true, 'controller' => 'pages', 'action' => 'gallery_edit', $idgallery['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('��������', array('admin' => true, 'controller' => 'catalogs', 'action' => 'admin_index', $idcatalogs['Page']['id']))."</li>";
	echo "<li>".$this->Html->link('��������', array('admin' => true, 'controller' => 'pages', 'action' => 'contacts_edit', $idcontacts['Page']['id']))."</li>";
  //echo "<li>".$this->Html->link('������� ��������', array('admin' => true, 'controller' => 'pages', 'action' => 'index_meta'/*, $idindex['Page']['id']*/))."</li>";
?>
</ul>

</div>