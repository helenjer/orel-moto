<?php
class PagesController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'Pages';
	
    function index()  {
		    $index = $this->Page->find('first', array('conditions' => array('name' => 'index')));
		    $index['Page']['text']= $this->_decode_from_db($index['Page']['text']);
		    $this->set('index',$index);
		    $this->_setmeta('details');
		    
		    $this->loadModel('Partner');
		    $allpartners= $this->Partner->find('all', array('order' => 'Partner.id ASC'));
		    
		    foreach ($allpartners as &$p) {
		    $p['Partner']['text']= $this->_decode_from_db($p['Partner']['text']);
		    };
		    $this->set('allpartners',$allpartners);
		    
		    $this->loadModel('News');
		    $allnews = $this->News->find('all', array('order' => array('News.date DESC', 'News.id DESC')));
		    
		    foreach ($allnews as &$n) {
		    $n['News']['text']= $this->_decode_from_db($n['News']['text']);
		    };
		    $this->set('allnews',$allnews);
		    
		    $this->_setmeta('index');
	
    }
	
	function details()  {
			$details = $this->Page->find('first', array('conditions' => array('name' => 'details')));
			$details['Page']['text']= $this->_decode_from_db($details['Page']['text']);
			$this->set('details',$details);
			$this->_setmeta('details');
    }
		
	function forsport()  {
			$forsport = $this->Page->find('first', array('conditions' => array('name' => 'forsport')));
			$forsport['Page']['text']= $this->_decode_from_db($forsport['Page']['text']);
			$this->set('forsport',$forsport);
			$this->_setmeta('forsport');
    }
    
	function spectech()  {
			$spectech = $this->Page->find('first', array('conditions' => array('name' => 'spectech')));
			$spectech['Page']['text']= $this->_decode_from_db($spectech['Page']['text']);
			$this->set('spectech',$spectech);
			$this->_setmeta('spectech');
    }
		
	function forchildren()  {
			$forchildren = $this->Page->find('first', array('conditions' => array('name' => 'forchildren')));
			$forchildren['Page']['text']= $this->_decode_from_db($forchildren['Page']['text']);
			$this->set('forchildren',$forchildren);
			$this->_setmeta('forchildren');
    }
    
	function boatmotors()  {
			$boatmotors = $this->Page->find('first', array('conditions' => array('name' => 'boatmotors')));
			$boatmotors['Page']['text']= $this->_decode_from_db($boatmotors['Page']['text']);
			$this->set('boatmotors',$boatmotors);
			$this->_setmeta('boatmotors');
    }

	function service()  {
	 	  $service = $this->Page->find('first', array('conditions' => array('name' => 'service')));
			$service['Page']['text']= $this->_decode_from_db($service['Page']['text']);
			$this->set('service',$service);
			$this->_setmeta('service');
    }
		
	function gallery()  {
	 	  $gallery = $this->Page->find('first', array('conditions' => array('name' => 'gallery')));
			$gallery['Page']['text']= $this->_decode_from_db($gallery['Page']['text']);
			$this->set('gallery',$gallery);
			$this->_setmeta('gallery');
    }
		
	function contacts()  {
	 	  $contacts = $this->Page->find('first', array('conditions' => array('name' => 'contacts')));
			$contacts['Page']['text']= $this->_decode_from_db($contacts['Page']['text']);
			$this->set('contacts',$contacts);
			$this->_setmeta('contacts');
    }
		
	function admin_details_edit($id = null)  {
	  $this->layout = 'admin';		
		$this->Page->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Page->read();
			$this->data['Page']['text']= $this->_decode_from_db($this->data['Page']['text']);
		} else {  	
		  $this->data['Page']['text']= $this->_encode_to_db($this->params['form']['spaw1']);	
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash('Сведения о запчастях и аксессуарах обновлены');
				$this->redirect(array('admin'=> true, 'controller' => 'users', 'action' => 'index'));
			}
		}
		$this->set('title_for_layout', 'Редактирование информации о запчастях и аксессуарах');
		//$this->set('keywords_for_layout', '');
		//$this->set('description_for_layout', '');
	}
	
	function admin_forsport_edit($id = null)  {
	  $this->layout = 'admin';		
		$this->Page->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Page->read();
			$this->data['Page']['text']= $this->_decode_from_db($this->data['Page']['text']);
		} else {  	
		  $this->data['Page']['text']= $this->_encode_to_db($this->params['form']['spaw1']);	
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash('Сведения о товарах для спорта обновлены');
				$this->redirect(array('admin'=> true, 'controller' => 'users', 'action' => 'index'));
			}
		}
		$this->set('title_for_layout', 'Редактирование информации о товарах для спорта');
		//$this->set('keywords_for_layout', '');
		//$this->set('description_for_layout', '');
	}
	
	function admin_spectech_edit($id = null)  {
	  $this->layout = 'admin';		
		$this->Page->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Page->read();
			$this->data['Page']['text']= $this->_decode_from_db($this->data['Page']['text']);
		} else {  	
		  $this->data['Page']['text']= $this->_encode_to_db($this->params['form']['spaw1']);	
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash('Сведения о спецтехнике обновлены');
				$this->redirect(array('admin'=> true, 'controller' => 'users', 'action' => 'index'));
			}
		}
		$this->set('title_for_layout', 'Редактирование информации о спецтехнике');
		//$this->set('keywords_for_layout', '');
		//$this->set('description_for_layout', '');
	}
	
	function admin_forchildren_edit($id = null)  {
	  $this->layout = 'admin';		
		$this->Page->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Page->read();
			$this->data['Page']['text']= $this->_decode_from_db($this->data['Page']['text']);
		} else {  	
		  $this->data['Page']['text']= $this->_encode_to_db($this->params['form']['spaw1']);	
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash('Сведения о детском транспорте обновлены');
				$this->redirect(array('admin'=> true, 'controller' => 'users', 'action' => 'index'));
			}
		}
		$this->set('title_for_layout', 'Редактирование информации о детском транспорте');
		//$this->set('keywords_for_layout', '');
		//$this->set('description_for_layout', '');
	}
	
	function admin_boatmotors_edit($id = null)  {
	  $this->layout = 'admin';		
		$this->Page->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Page->read();
			$this->data['Page']['text']= $this->_decode_from_db($this->data['Page']['text']);
		} else {  	
		  $this->data['Page']['text']= $this->_encode_to_db($this->params['form']['spaw1']);	
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash('Сведения о лодочных моторах обновлены');
				$this->redirect(array('admin'=> true, 'controller' => 'users', 'action' => 'index'));
			}
		}
		$this->set('title_for_layout', 'Редактирование информации о лодочных моторах');
		//$this->set('keywords_for_layout', '');
		//$this->set('description_for_layout', '');
	}
	
	function admin_service_edit($id = null)  {
	  $this->layout = 'admin';		
		$this->Page->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Page->read();
			$this->data['Page']['text']= $this->_decode_from_db($this->data['Page']['text']);
		} else { 
	   	$this->data['Page']['text']= $this->_encode_to_db($this->params['form']['spaw1']);	
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash('Сведения о сервисном центре обновлены');
				$this->redirect(array('admin'=> true, 'controller' => 'users', 'action' => 'index'));
			}
		}
		$this->set('title_for_layout', 'Редактирование информации о сервисном центре');
		//$this->set('keywords_for_layout', '');
		//$this->set('description_for_layout', '');
	}	
	
	function admin_gallery_edit($id = null)  {
	  $this->layout = 'admin';		
		$this->Page->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Page->read();
			$this->data['Page']['text']= $this->_decode_from_db($this->data['Page']['text']);
		} else { 
	   	$this->data['Page']['text']= $this->_encode_to_db($this->params['form']['spaw1']);	
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash('Сведения о галерее обновлены');
				$this->redirect(array('admin'=> true, 'controller' => 'users', 'action' => 'index'));
			}
		}
		$this->set('title_for_layout', 'Редактирование галереи');
		//$this->set('keywords_for_layout', '');
		//$this->set('description_for_layout', '');
	}	
		
	function admin_contacts_edit($id = null)  {
	  $this->layout = 'admin';		
		$this->Page->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Page->read();
			$this->data['Page']['text']= $this->_decode_from_db($this->data['Page']['text']);
		} else { 
	   	$this->data['Page']['text']= $this->_encode_to_db($this->params['form']['spaw1']);	
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash('Сведения о контактах обновлены');
				$this->redirect(array('admin'=> true, 'controller' => 'users', 'action' => 'index'));
			}
		}
		$this->set('title_for_layout', 'Редактирование контактной информации');
		//$this->set('keywords_for_layout', '');
		//$this->set('description_for_layout', '');
	}
	
	function admin_index_edit($id = null)  {
	  $this->layout = 'admin';		
		$this->Page->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Page->read();
			$this->data['Page']['text']= $this->_decode_from_db($this->data['Page']['text']);
		} else { 
	   	$this->data['Page']['text']= $this->_encode_to_db($this->params['form']['spaw1']);	
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash('Главная страница обновлена');
				$this->redirect(array('admin'=> true, 'controller' => 'users', 'action' => 'index'));
			}
		};
		$this->loadModel('Partner');
		$partners= $this->Partner->find('all', array('order' => 'Partner.id ASC'));
		$this->set('partners',$partners);
		
		$this->loadModel('News');
		$news= $this->News->find('all', array('order' => array('News.date DESC', 'News.id DESC')));
		$this->set('news',$news);
		
		$this->set('title_for_layout', 'Редактирование главной страницы');
		//$this->set('keywords_for_layout', '');
		//$this->set('description_for_layout', '');
	}
		
}
?>