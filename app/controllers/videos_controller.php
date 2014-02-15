<?php
class VideosController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'Videos';
		
	
	function admin_delete($id) {
		$this->layout = 'admin';
		//удаление изображения с диска
		$this->Video->id = $id;
		$img = $this->Video->field('img');
		if ($this->Video->delete($id)) {
			if (!empty($img)) @unlink(IMAGES.$img);
			$this->Session->setFlash('Видео успешно удалено');
			$this->redirect(array('admin'=> true, 'controller' => 'mototechnics', 'action' => 'index'));     
		}
		$this->set('title_for_layout', 'Удаление видео');
	}
}

?>