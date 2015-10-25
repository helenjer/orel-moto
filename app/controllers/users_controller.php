<?php
class UsersController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'Users';
			
	function login() { 
		$this->layout = 'login';
		if ($this->Session->check('User.username')) { 
			$this->redirect(array('admin' => true, 'action' => 'index')); 
		}
		elseif (!empty($this->data)){
			$user = $this->User->find('all', array('limit' => 1, 'conditions' => array('User.username' => $this->data['User']['username'])));
			if (!empty($user)) $psw = $user[0]['User']['password']; 
			if (!empty($psw)&& ($psw == md5($this->data['User']['password']))) {
				$this->Session->write('User.username', 'admin'); 
				$this->Session->setFlash('Вход успешно выполнен');  
				$this->redirect(array('admin' => true, 'action' => 'index'));	
			}
			else $this->Session->setFlash('Неверное имя пользователя и/или пароль'); 
		}
		$this->set('title_for_layout', 'Вход');
		$this->set('keywords_for_layout', '');
		$this->set('description_for_layout', 'Панель администрирования');
	}

	function logout() {
		$this->layout = 'login';
		$this->Session->delete('User'); 
		$this->Session->setFlash('Выход успешно выполнен');   
		$this->redirect(array('admin' => false, 'action' => 'login'));	
		$this->set('title_for_layout', 'Выход');
		$this->set('keywords_for_layout', '');
		$this->set('description_for_layout', 'Панель администрирования');
	}

	function admin_index() {
		$this->layout = 'admin';
		$this->loadModel('Page');
		$this->set('idindex', $this->Page->find('first', array('conditions' => array('name' => 'index'))));
		$this->set('iddetails', $this->Page->find('first', array('conditions' => array('name' => 'details'))));
		$this->set('idforsport', $this->Page->find('first', array('conditions' => array('name' => 'forsport'))));
		$this->set('idspectech', $this->Page->find('first', array('conditions' => array('name' => 'spectech'))));
		$this->set('idforchildren', $this->Page->find('first', array('conditions' => array('name' => 'forchildren'))));
		$this->set('idboatmotors', $this->Page->find('first', array('conditions' => array('name' => 'boatmotors'))));
		$this->set('idservice', $this->Page->find('first', array('conditions' => array('name' => 'service'))));
		$this->set('idgallery', $this->Page->find('first', array('conditions' => array('name' => 'gallery'))));
		$this->set('idcatalogs', $this->Page->find('first', array('conditions' => array('name' => 'catalogs'))));
		$this->set('idmuseum', $this->Page->find('first', array('conditions' => array('name' => 'museum'))));
		$this->set('idcontacts', $this->Page->find('first', array('conditions' => array('name' => 'contacts'))));
	  $this->set('title_for_layout', 'Панель администрирования');
	}
	 
}
?>