<?php
class NewsController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'News';
		

	
	
    function index()  {
		
    }


    function admin_add() { 
	    $this->layout = 'admin';
		if (isset($this->params['form']['spaw1']) && empty($this->params['form']['spaw1'])) $this->Session->setFlash('Заполните текст новости', 'default', array('class' => 'error-message'));
		else {
		    $this->data['News']['text']= $this->_encode_to_db($this->params['form']['spaw1']);
		    $this->data['News']['date'] = date('Y-m-d');
		    
		    if ($this->News->save($this->data)) {
			$this->Session->setFlash('Новость успешно добавлена');
			$this->redirect(array('controller' => 'pages', 'admin'=> true, 'action' => 'index_edit'));
		    }		
		}			  
	    $this->set('title_for_layout', 'Добавление новости');
    }
	
	
    function admin_edit($id = null) {
	    $this->layout = 'admin';
	    $this->News->id = $id;
	    if (empty($this->data)) {
		    $this->data = $this->News->read();
		    $this->data['News']['text'] = $this->_decode_from_db($this->data['News']['text']);
	    } else {
		if (empty($this->params['form']['spaw1'])) $this->Session->setFlash('Заполните текст новости', 'default', array('class' => 'error-message'));
		else {
			$this->data['News']['text']= $this->_encode_to_db($this->params['form']['spaw1']);
			if ($this->News->save($this->data)) {
			    $this->Session->setFlash('Новость успешно обновлена');
			    $this->redirect(array('controller' => 'pages', 'admin'=> true, 'action' => 'index_edit'));
			}
		}
	    }	
	    $this->set('title_for_layout', 'Редактирование новости');
    }
	
	
    function admin_delete($id) {
	    $this->layout = 'admin';
	    $this->News->id = $id;
	    if ($this->News->delete($id)) {
		    $this->Session->setFlash('Новость успешно удалена');
		    $this->redirect(array('controller' => 'pages', 'admin'=> true, 'action' => 'index_edit'));     
	    }
	    $this->set('title_for_layout', 'Удаление новости');
    }

}

?>