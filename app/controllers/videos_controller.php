<?php
class VideosController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'Videos';
		
	
	function admin_delete($id) {
		$this->layout = 'admin';
		//�������� ����������� � �����
		$this->Video->id = $id;
		$img = $this->Video->field('img');
		if ($this->Video->delete($id)) {
			if (!empty($img)) @unlink(IMAGES.$img);
			$this->Session->setFlash('����� ������� �������');
			$this->redirect(array('admin'=> true, 'controller' => 'mototechnics', 'action' => 'index'));     
		}
		$this->set('title_for_layout', '�������� �����');
	}
}

?>