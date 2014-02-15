<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {
	//var $helpers = array ('Html','Form');
	var $components = array('Session');
	var $view = 'Theme';
	
	function _encode_to_db ($str) {
		$str = htmlspecialchars($str, ENT_QUOTES);
		if (get_magic_quotes_gpc()) {
			return $str;
		}
		else     {
			return addslashes($str);
		}     
	}
	
	function _decode_from_db ($str) {
		$str = htmlspecialchars_decode(stripcslashes($str), ENT_QUOTES);
		return $str;		
	}
	
	function _setmeta($name) {
	  $this->loadModel('Page');
	 	$info = $this->Page->find('first', array('conditions' => array('name' => $name)));
		$this->set('title_for_layout', $info['Page']['title']);
		$this->set('keywords_for_layout', $info['Page']['keywords']);
		$this->set('description_for_layout', $info['Page']['description']);
	}
	
	function beforeFilter() {
	
		//session_name('CAKEPHP');
		//session_start();
		
		if (isset($this->params[Configure::read('Routing.prefixes.0')])) { 
			if (!$this->Session->check('User.username')) { 
			//if (!isset($_SESSION['User']['username'])) {
				$this->redirect(array('admin'=> false, 'controller'=> 'users','action' => 'login')); 
			}
		}
	}
}
