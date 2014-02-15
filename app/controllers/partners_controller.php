<?php
class PartnersController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'Partners';
	
	
    function index()  {
	
    }    
    
    function admin_edit($id = null)  {
      $this->layout = 'admin';		
	    $this->Partner->id = $id;
	    if (empty($this->data)) {
		    $this->data = $this->Partner->read();
		    $this->data['Partner']['text']= $this->_decode_from_db($this->data['Partner']['text']);
	    } else {  	
	      $this->data['Partner']['text']= $this->_encode_to_db($this->params['form']['spaw1']);	
		    if ($this->Partner->save($this->data)) {
			    $this->Session->setFlash('Сведения о партнере обновлены');
			    $this->redirect(array('admin'=> true, 'controller' => 'users', 'action' => 'index'));
		    }
	    }
	    $this->set('title_for_layout', 'Редактирование партнера');
    }

}

?>