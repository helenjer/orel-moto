<?php
class MototechnicsController extends AppController {
    var $helpers = array ('Html','Form','Mototech');
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
						
		//	print_r($this->data['Video']);
			if ($wrongformat) $this->Session->setFlash('Недопустимый формат изображений. Доступные форматы: JPEG, GIF, PNG');
				elseif ($this->Mototechnic->saveAll($this->data, array('deep' => true))) {
					if ($optype === 'add') {
						//рассылка -> do nothing

					}
				    if ($optype === 'add') $this->Session->setFlash('Модель успешно добавлена');
					if ($optype === 'edit') $this->Session->setFlash('Модель успешно обновлена');
					// redirect, depending on entity type;
					$prev_url = $this->_getPrevPageLink();
					$this->redirect(array('admin'=> true, 'controller' => 'mototechnics', 'action' => $prev_url['action'], '#' => $prev_url['anchor']));         
					return true;
				}
	}
	
	function _getPrevPageLink() {
		$prev_url = array();
		$m_type = $this->data['Mototechnic']['type'] ? $this->data['Mototechnic']['type'] : $this->Mototechnic->field('type');
		switch ($m_type) {
			case  'bicycle':
				$prev_url['action'] = 'bicycles_index';
				$prev_url['anchor'] = $this->data['Mototechnic']['sub_type'];
			break;
			case  'motochild':
				$prev_url['action'] = 'motochild_index';
				$prev_url['anchor'] = $this->data['Mototechnic']['sub_type'];
			break;
			default:
				$prev_url['action'] = 'index';
				$prev_url['anchor'] = $this->data['Mototechnic']['type'];
			break;
		}
		return $prev_url;
	}
	
	
    function index()  {
		
    }
	
	function scooters($company = null)  {
		$this->loadModel('Company');  #TODO !!! table 'Company' instead of field 'company'
		$company_info = Array();
		if ($company != null) {
			$scooters = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'scooter', 'company' => $company), 'order' => array('weight DESC', 'date_add')));
			$this->set('thiscrumb','1');
		}
		else $scooters = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'scooter', 'NOT' => array('Mototechnic.company' => array('omaks', 'hors'))), 'order' => array('company', 'weight DESC', 'date_add')));
    foreach ($scooters as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
			$company_info[]= $this->Company->find('first', array('conditions' => array('name' => $m['Mototechnic']['company'])));
		}
		$this->set('scooters',$scooters);
		$this->set('company_info',$company_info);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type ='scooter' && company NOT IN ('omaks', 'hors') ORDER BY company ASC;"));
		$this->_setmeta('scooter');
	}
	
	function mopeds($company = null)  {
		$this->loadModel('Company');
		$company_info = Array();
		if ($company != null) {
			$mopeds = $this->Mototechnic->find('all',  array('conditions' => array('type' =>'moped', 'company' => $company), 'order' => array('weight DESC', 'date_add')));
			$this->set('thiscrumb','1');
		}
		else 	$mopeds = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'moped', 'NOT' => array('Mototechnic.company' => array('omaks', 'hors'))), 'order' => array('company', 'weight DESC', 'date_add')));
		foreach ($mopeds as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
			$company_info[]= $this->Company->find('first', array('conditions' => array('name' => $m['Mototechnic']['company'])));

		} 
		$this->set('mopeds',$mopeds );
		$this->set('company_info',$company_info);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type = 'moped' && company NOT IN ('omaks', 'hors')  ORDER BY company ASC;"));

		$this->_setmeta('moped');
	}
	
	function motorcycles($company = null)  {
		$this->loadModel('Company');
		$company_info = Array();
		if ($company != null) {
			$motorcycles = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'motorcycle', 'company' => $company), 'order' => array('weight DESC', 'date_add')));
		  $this->set('thiscrumb','1');
		}
		else	$motorcycles =$this->Mototechnic->find('all',  array('conditions' => array('type' => 'motorcycle', 'NOT' => array('Mototechnic.company' => array('omaks', 'hors'))), 'order' => array('company', 'weight DESC', 'date_add')));
		foreach ($motorcycles as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
			$company_info[]= $this->Company->find('first', array('conditions' => array('name' => $m['Mototechnic']['company'])));

		}
		$this->set('motorcycles',$motorcycles);
		$this->set('company_info',$company_info);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type = 'motorcycle' && company NOT IN ('omaks', 'hors')  ORDER BY company ASC;"));
		$this->_setmeta('motorcycle');
	}
	
	function motorollers($company = null)  {
		$this->loadModel('Company');
		$company_info = Array();
		if ($company != null) {
			$motorollers = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'motoroller', 'company' => $company), 'order' => array('weight DESC', 'date_add')));
		  $this->set('thiscrumb','1');
		}
		else	$motorollers =$this->Mototechnic->find('all',  array('conditions' => array('type' => 'motoroller', 'NOT' => array('Mototechnic.company' => array('omaks', 'hors'))), 'order' => array('company', 'weight DESC', 'date_add')));
		foreach ($motorollers as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
			$company_info[]= $this->Company->find('first', array('conditions' => array('name' => $m['Mototechnic']['company'])));
		}
		$this->set('motorollers',$motorollers);
		$this->set('company_info',$company_info);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type = 'motoroller' && company NOT IN ('omaks', 'hors')  ORDER BY company ASC;"));
		$this->_setmeta('motoroller');
	}
	
	function quadrocycles($company = null)  {
		$this->loadModel('Company');
		$company_info = Array();
		if ($company != null) { 
			$quadrocycles = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'quadrocycle', 'company' => $company), 'order' => array('weight DESC', 'date_add')));
		  $this->set('thiscrumb','1');
		}
		else 	$quadrocycles = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'quadrocycle', 'NOT' => array('Mototechnic.company' => array('omaks', 'hors'))), 'order' => array('company', 'weight DESC', 'date_add')));
		foreach ($quadrocycles as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
			$company_info[]= $this->Company->find('first', array('conditions' => array('name' => $m['Mototechnic']['company'])));
		}
		$this->set('quadrocycles',$quadrocycles);
		$this->set('company_info',$company_info);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type='quadrocycle' && company NOT IN ('omaks', 'hors')  ORDER BY company ASC;"));
		$this->_setmeta('quadrocycle');
	}
	
	
	function snows($company = null)  {
		$this->loadModel('Company');
		$company_info = Array();
		if ($company != null) { 
			$snows = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'snow', 'company' => $company), 'order' => array('weight DESC', 'date_add')));
		  $this->set('thiscrumb','1');
		}
		else 	$snows = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'snow', 'NOT' => array('Mototechnic.company' => array('omaks', 'hors'))), 'order' => array('company', 'weight DESC', 'date_add')));
		foreach ($snows as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
			$company_info[]= $this->Company->find('first', array('conditions' => array('name' => $m['Mototechnic']['company'])));
		}
		$this->set('snows',$snows);
		$this->set('company_info',$company_info);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type='snow' && company NOT IN ('omaks', 'hors') ORDER BY company ASC;"));
		$this->_setmeta('snow');
	}
	
	
	function bicycles($sub_type = null, $company = null)  {
		$this->loadModel('Company');
	    if ($sub_type != null) {
		$this->loadModel('Motofile');
		if ($company != null) {
		    
		    $bicycles = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'bicycle', 'sub_type' => $sub_type, 'company' => $company), 'order' => array('date_add')));
		    $this->set('motofiles',$this->Motofile->find('first',  array('conditions' => array('type' => 'bicycle', 'sub_type' => $sub_type, 'company' => $company), 'order' => array('date_add' => 'DESC' ))));
				$this->set('thiscrumb','1');
		}
		else {
		    $bicycles = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'bicycle', 'sub_type' => $sub_type), 'order' => array('company', 'date_add')));
				$this->set('motofiles',$this->Motofile->find('all',  array('conditions' => array('type' => 'bicycle', 'sub_type' => $sub_type), 'order' => array('company', 'date_add' => 'DESC' ))));
		}
		//$this->set('thiscrumb','1');
		
		$bicycle_index = false;
		
		
		foreach ($bicycles as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
			$company_info[]= $this->Company->find('first', array('conditions' => array('name' => $m['Mototechnic']['company'])));

		}
		$this->set('bicycles',$bicycles);
		$this->set('company_info',$company_info);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type='bicycle' and sub_type='".$sub_type."' ORDER BY company ASC;"));
		
	    }
	    else $bicycle_index = true;
	    
		
	    $this->set('bicycle_index',$bicycle_index);
	    $this->_setmeta('bicycle');

	}
	
	
	function motochild ($sub_type = null, $company = null)  {
		$this->loadModel('Company');
	    if ($sub_type != null) {
		$this->loadModel('Motofile');
		if ($company != null) {
		    
		    $motochild = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'motochild', 'sub_type' => $sub_type, 'company' => $company), 'order' => array('date_add')));
		    $this->set('motofiles',$this->Motofile->find('first',  array('conditions' => array('type' => 'motochild', 'sub_type' => $sub_type, 'company' => $company), 'order' => array('date_add' => 'DESC' ))));
				$this->set('thiscrumb','1');
		}
		else {
		    $motochild = $this->Mototechnic->find('all',  array('conditions' => array('type' => 'motochild', 'sub_type' => $sub_type), 'order' => array('company', 'date_add')));
				$this->set('motofiles',$this->Motofile->find('all',  array('conditions' => array('type' => 'motochild', 'sub_type' => $sub_type), 'order' => array('company', 'date_add' => 'DESC' ))));

		}
		//$this->set('thiscrumb','1');
		
		$motochild_index = false;
		
		
		foreach ($motochild as &$m) {
		  $m['Mototechnic']['short_txt']= $this->_decode_from_db($m['Mototechnic']['short_txt']);
			$m['Mototechnic']['full_txt']= $this->_decode_from_db($m['Mototechnic']['full_txt']);
			$company_info[]= $this->Company->find('first', array('conditions' => array('name' => $m['Mototechnic']['company'])));

		}
		$this->set('motochild',$motochild);
		$this->set('company_info',$company_info);
		$this->set('companies',$this->Mototechnic->query("SELECT distinct company FROM mototechnics WHERE type='motochild' and sub_type='".$sub_type."' ORDER BY company ASC;"));
		
	    }
	    else $motochild_index = true;
	    
	    $this->set('motochild_index',$motochild_index);
	    $this->_setmeta('motochild');

	}
	
	
	function view($id = null) {
		$this->loadModel('Video');
		$this->Mototechnic->id = $id;
		$tech = $this->Mototechnic->read();
		$tech['Mototechnic']['full_txt'] = $this->_decode_from_db($tech['Mototechnic']['full_txt']);
		$tech['Mototechnic']['short_txt'] = $this->_decode_from_db($tech['Mototechnic']['short_txt']);
		$tech['Mototechnic']['sub_txt'] = $this->_decode_from_db($tech['Mototechnic']['sub_txt']);
		$tech['Mototechnic']['video_txt'] = $this->_decode_from_db($tech['Mototechnic']['video_txt']);
		$this->set('tech', $tech);
		$this->_setmeta($tech['Mototechnic']['type']);
    }

	function admin_index() {
		$this->layout = 'admin';
		$types = Array('scooter', 'moped', 'motorcycle', 'motoroller', 'quadrocycle', 'snow');
		$models = Array();
		foreach ($types as $type) {
			$models[$type] = $this->Mototechnic->find('all',  array('conditions' => array('type' =>  $type), 'order' => array('company', 'weight DESC', 'date_add')));
		}
		$this->set('models', $models);
		/*TODO 'undef' here and in views*/
		$this->set('undef', $this->Mototechnic->find('all',  array('conditions' => array('type' =>  array('scooter', 'moped'), 'volume' => ''), 'order' => array('company', 'weight DESC', 'date_add'))));
		$this->set('title_for_layout', 'Редактирование мототехники');
	}
	
	function admin_bicycles_index () {
	    $this->layout = 'admin';
	    $this->loadModel('Motofile');
			$subtypes = Array('children', 'folding', 'road', 'sport', 'two_suspend');
			$models = Array();
			foreach ($subtypes as $subtype) {
				$models[$subtype] = array();
				$models[$subtype]['models'] = $this->Mototechnic->find('all',  array('conditions' => array('type' =>  'bicycle', 'sub_type' =>  $subtype), 'order' => array('company', 'weight DESC', 'date_add')));
				$models[$subtype]['files'] = $this->Motofile->find('all',  array('conditions' => array('type' =>  'bicycle', 'sub_type' => $subtype), 'order' => array('company', 'date_add')));
			}
			$this->set('models', $models);
	    $this->set('title_for_layout', 'Редактирование велосипедов');  
	}
	
	function admin_motochild_index () {
	    $this->layout = 'admin';
	    $this->loadModel('Motofile');
			$subtypes = Array('cars_akkum_radio', 'cars_akkum', 'motocycle_akkum', 'bicycles_3', 'cars');
			$models = Array();
			foreach ($subtypes as $subtype) {
				$models[$subtype] = array();
				$models[$subtype]['models'] = $this->Mototechnic->find('all',  array('conditions' => array('type' =>  'motochild', 'sub_type' =>  $subtype), 'order' => array('company', 'weight DESC', 'date_add')));
				$models[$subtype]['files'] = $this->Motofile->find('all',  array('conditions' => array('type' =>  'motochild', 'sub_type' => $subtype), 'order' => array('company', 'date_add')));
			}
			$this->set('models', $models);   
	    $this->set('title_for_layout', 'Редактирование детского транспорта');  
	}

	function admin_add() {
		$this->layout = 'admin';
		if (!empty($this->data)) {   
			if (empty($this->params['form']['spaw2'])) $this->Session->setFlash('Заполните полное описание модели', 'default', array('class' => 'error-message'));  
				else  {
					$this->data['Mototechnic']['full_txt']= $this->_encode_to_db($this->params['form']['spaw2']);	
					$this->data['Mototechnic']['short_txt']= $this->_encode_to_db($this->params['form']['spaw1']);
					$this->data['Mototechnic']['sub_txt']= $this->_encode_to_db($this->params['form']['spaw3']);
					//$this->data['Mototechnic']['video_txt'] = $this->_encode_to_db($this->params['form']['spaw4']);
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
			$this->data['Mototechnic']['sub_txt']= $this->_decode_from_db($this->data['Mototechnic']['sub_txt']);
			$this->data['Mototechnic']['video_txt']= $this->_decode_from_db($this->data['Mototechnic']['video_txt']);
		} else {
			if (empty($this->params['form']['spaw2'])) $this->Session->setFlash('Заполните подробное описание модели', 'default', array('class' => 'error-message')); 
				else  {
					$this->data['Mototechnic']['full_txt']= $this->_encode_to_db($this->params['form']['spaw2']);	
	   			$this->data['Mototechnic']['short_txt']= $this->_encode_to_db($this->params['form']['spaw1']);
					$this->data['Mototechnic']['sub_txt']= $this->_encode_to_db($this->params['form']['spaw3']);
				//$this->data['Mototechnic']['video_txt']= $this->_encode_to_db($this->params['form']['spaw4']);
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
		$prev_url = $this->_getPrevPageLink();
		if ($this->Mototechnic->delete($id)) {
			if (!empty($img)) @unlink(IMAGES.$img);
			$this->Session->setFlash('Модель успешно удалена');
			$this->redirect(array('admin'=> true, 'controller' => 'mototechnics', 'action' => $prev_url['action'], '#' => $prev_url['anchor']));         
	    
		}
		$this->set('title_for_layout', 'Удаление модели');
	}
}

?>