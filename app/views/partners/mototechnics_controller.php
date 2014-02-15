<?php
class MototechnicsController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'Mototechnics';
		
	function _load_img ($oldimg, $optype) {		
		$fld_name = 'moto/';	
		$wrongformat = false;
		$file = $this->data['Mototechnic']['img'];
			if (!empty($file['name'])) { //изображение выбрано для загрузки 
				if (($file['type'] != 'image/jpeg')&&
				   ($file['type'] != 'image/gif')&&
				   ($file['type'] != 'image/png')) {
					$wrongformat = true;
				} 
				elseif ($file['error'] == 0) {
					if (!preg_match('/^[A-Za-z_0-9]+\.[A-Za-z]{3}$/',$file['name'],$fullname)) {
						$fullname[0] = str_replace('.','',strval(microtime(1))).substr($file['name'],-4);
					}
					$this->data['Mototechnic']['img'] = $fld_name.$fullname[0];			
					$f = file_get_contents($file['tmp_name']);
					file_put_contents(IMAGES.$this->data['Mototechnic']['img'],$f);
                    if (!empty($oldimg)) @unlink(IMAGES.$oldimg); // удаление старого изображения					
				} else $this->Session->setFlash('Ошибка при загрузке изображения');  
				} else 	$this->data['Mototechnic']['img'] = $oldimg; // оставляем старое изображение

			if ($wrongformat) $this->Session->setFlash('Недопустимый формат изображений. Доступные форматы: JPEG, GIF, PNG');
				elseif ($this->Mototechnic->save($this->data)) {
					if ($optype === 'add') {
						//рассылка -> do nothing

					}
				    if ($optype === 'add') $this->Session->setFlash('Модель успешно добавлена');
					if ($optype === 'edit') $this->Session->setFlash('Модель успешно обновлена');
					$this->redirect(array('admin'=> true, 'action' => 'index'));     
					return true;
				}
	}
	
	
    function index()  {
		
    }
	
	function after50($company = null)  {	
		if ($company != null) {
			$after50 = $this->Mototechnic->find('all',  array('conditions' => array('type' => array('scooter', 'moped'), 'volume' => 'after50', 'company' => $company), 'order' => array('weight', 'date_add')));
			$this->set('thiscrumb','1');
		}
		else $after50 = $this->Mototechnic->find('all',  array('conditions' => array('type' => array('scooter', 'moped'), 'volume' => 'after50'), 'order' => array('company', 'weight', 'date_add')));
    foreach ($after50 as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
		}
		$this->set('after50',$after50);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type in ('scooter','moped')  and volume = 'after50' ORDER BY company ASC;"));
		$this->_setmeta('scooter');
	}
	
	function before50($company = null)  { 
		if ($company != null) {
			$before50 = $this->Mototechnic->find('all',  array('conditions' => array('type' => array('scooter', 'moped'), 'volume' => 'before50', 'company' => $company), 'order' => array('weight', 'date_add')));
			$this->set('thiscrumb','1');
		}
		else 	$before50 = $this->Mototechnic->find('all',  array('conditions' => array('type' => array('scooter', 'moped'), 'volume' => 'before50'), 'order' => array('company', 'weight', 'date_add')));
		foreach ($before50 as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
		} 
		$this->set('before50',$before50);
				$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type in ('scooter','moped')  and volume = 'before50' ORDER BY company ASC;"));

		$this->_setmeta('scooter');
	}
	
	function motorcycles($company = null)  {
		if ($company != null) {
			$motorcycles = $this->Mototechnic->find('all',  array('conditions' => array('type' => array('motorcycle', 'motoroller'), 'company' => $company), 'order' => array('weight', 'date_add')));
		  $this->set('thiscrumb','1');
		}
		else	$motorcycles =$this->Mototechnic->find('all',  array('conditions' => array('type' => array('motorcycle', 'motoroller')), 'order' => array('company', 'weight', 'date_add')));
    foreach ($motorcycles as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
		}
		$this->set('motorcycles',$motorcycles);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type in ('motorcycle', 'motoroller') ORDER BY company ASC;"));
		$this->_setmeta('motorcycle');
	}
	
	function quadrocycles($company = null)  {
		if ($company != null) { 
			$quadrocycles = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'quadrocycle', 'company' => $company), 'order' => array('weight', 'date_add')));
		  $this->set('thiscrumb','1');
		}
		else 	$quadrocycles = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'quadrocycle'), 'order' => array('company', 'weight', 'date_add')));
    foreach ($quadrocycles as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
		}
		$this->set('quadrocycles',$quadrocycles);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type='quadrocycle' ORDER BY company ASC;"));
		$this->_setmeta('quadrocycle');
	}
	
	function view($id = null) {
    $this->Mototechnic->id = $id;
		$tech = $this->Mototechnic->read();
		$tech['Mototechnic']['full_txt'] = $this->_decode_from_db($tech['Mototechnic']['full_txt']);
		$tech['Mototechnic']['short_txt'] = $this->_decode_from_db($tech['Mototechnic']['short_txt']);
    $this->set('tech', $tech);
		$this->_setmeta($tech['Mototechnic']['type']);
    }

	function admin_index() {
		$this->layout = 'admin';
		$this->set('before50', $this->Mototechnic->find('all',  array('conditions' => array('type' =>  array('scooter', 'moped'), 'volume' => 'before50'), 'order' => array('company', 'weight', 'date_add'))));
    $this->set('after50', $this->Mototechnic->find('all',  array('conditions' => array('type' =>  array('scooter', 'moped'), 'volume' => 'after50'), 'order' => array('company', 'weight', 'date_add'))));
	  $this->set('undef', $this->Mototechnic->find('all',  array('conditions' => array('type' =>  array('scooter', 'moped'), 'volume' => ''), 'order' => array('company', 'weight', 'date_add'))));
		$this->set('motorcycles', $this->Mototechnic->find('all',  array('conditions' => array('type' => array('motorcycle', 'motoroller')), 'order' => array('company', 'weight', 'date_add'))));
   	$this->set('quadrocycles', $this->Mototechnic->find('all',  array('conditions' => array('type' => 'quadrocycle'), 'order' => array('company', 'weight', 'date_add'))));
		$this->set('title_for_layout', 'Редактирование мототехники');
	}

	function admin_add() { 
		$this->layout = 'admin';
		if (!empty($this->data)) {   
			if (empty($this->params['form']['spaw2'])) $this->Session->setFlash('Заполните полное описание модели', 'default', array('class' => 'error-message'));  
				else  {
					$this->data['Mototechnic']['full_txt']= $this->_encode_to_db($this->params['form']['spaw2']);	
					$this->data['Mototechnic']['short_txt']= $this->_encode_to_db($this->params['form']['spaw1']);		
					$this->data['Mototechnic']['date_add'] = date('Y-m-d');

					$oldimg =''; 
					$optype ='add';	
					$this->_load_img ($oldimg, $optype) ;
				}			
		}    
		$this->set('title_for_layout', 'Добавление модели');
	}
	
	function admin_edit($id = null) {
		$this->layout = 'admin';
		$this->Mototechnic->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Mototechnic->read();
			$this->data['Mototechnic']['short_txt'] = $this->_decode_from_db($this->data['Mototechnic']['short_txt']);
			$this->data['Mototechnic']['full_txt'] = $this->_decode_from_db($this->data['Mototechnic']['full_txt']);
		} else {
			if (empty($this->params['form']['spaw2'])) $this->Session->setFlash('Заполните подробное описание модели', 'default', array('class' => 'error-message')); 
				else  {
					$this->data['Mototechnic']['full_txt']= $this->_encode_to_db($this->params['form']['spaw2']);	
	   			$this->data['Mototechnic']['short_txt']= $this->_encode_to_db($this->params['form']['spaw1']);
					$oldimg = $this->Mototechnic->field('img');
			    $optype ='edit';
		    	$this->_load_img ($oldimg, $optype) ;
				}
		}	
		$this->set('title_for_layout', 'Редактирование модели');
	}
	
	function admin_delete($id) {
		$this->layout = 'admin';
		//удаление изображения с диска
		$this->Mototechnic->id = $id;
		$img = $this->Mototechnic->field('img');
		if ($this->Mototechnic->delete($id)) {
			if (!empty($img)) @unlink(IMAGES.$img);
			$this->Session->setFlash('Модель успешно удалена');
			$this->redirect(array('admin'=> true, 'action' => 'index'));     
		}
		$this->set('title_for_layout', 'Удаление модели');
	}
}

?>