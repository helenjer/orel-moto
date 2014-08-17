<?php
class CatalogsController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'Catalogs';
		
	function _load_file ($oldfile, $optype) {		
		$fld_name = 'catalogs/';
		$allow_formats = array ('application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','text/plain','application/rtf');
		$wrongformat = false;
		$file = $this->data['Catalog']['url'];
			if (!empty($file['name'])) { //изображение выбрано для загрузки 
				if (!in_array($file['type'],$allow_formats) && !preg_match('/(\.pdf$)|(\.xls$)|(\.xlsx$)|(\.doc$)|(\.docx$)|(\.rtf$)|(\.png$)|(\.jpg$)||(\.gif$)/',$file['name'])) {
					$wrongformat = true;
				} 
				elseif ($file['error'] == 0) {
					if (!preg_match('/^[A-Za-z_0-9]+\.[A-Za-z]{3,4}$/',$file['name'],$fullname)) {
						$fullname[0] = str_replace('.','',strval(microtime(1))).substr($file['name'],-4);
					}
					$this->data['Catalog']['url'] = $fld_name.$fullname[0];			
					$f = file_get_contents($file['tmp_name']);
					file_put_contents(WWW_ROOT.'files'.DS.$this->data['Catalog']['url'],$f);
                    if (!empty($oldfile)) @unlink(WWW_ROOT.'files'.DS.$oldfile); // удаление старого изображения					
				} else $this->Session->setFlash('Ошибка при загрузке файла');  
				} else 	$this->data['Catalog']['url'] = $oldfile; // оставляем старое изображение

			if ($wrongformat) $this->Session->setFlash('Недопустимый формат файла. Доступные форматы: PDF, DOC, DOCX, XLS, XLSX, RTF, TXT, PNG, JPG, GIF');
				elseif ($this->Catalog->save($this->data)) {
					if ($optype === 'add') {
						//рассылка -> do nothing

					}
				    if ($optype === 'add') $this->Session->setFlash('Каталог успешно добавлен');
					if ($optype === 'edit') $this->Session->setFlash('Каталог успешно обновлен');
					$this->redirect(array('controller' => 'catalogs', 'admin'=> true, 'action' => 'index'));     
					return true;
				}
	}
	
	
  function index($company_name = null)  {
		$this->loadModel('Company');
		if (isset($this->params['url']['company']))		$company_name = $this->params['url']['company'];
		$this->_setmeta('catalogs');
		if ($company_name != null) {

			$company = $this->Company->find('first', array('conditions' => array('name' => $company_name)));	
		
			$catalogs = $this->Catalog->find('all',  array('conditions' => array('company_id' => $company['Company']['id']), 'order' => array('date_add DESC')));			
			//$this->set('thiscrumb','1');
			$this->set('company', $company);
			$this->set('catalogs', $catalogs);
			$this->render('catalogs_list');
		}
			
		else {
			$this->set('companies',$this->Company->query("SELECT distinct name FROM companies"));
		}
  }
	
	function admin_index() {
		$this->layout = 'admin';
		$this->loadModel('Company');		
		$this->set('companies',$this->Company->find('all'));		
		$this->set('title_for_layout', 'Редактирование каталогов');
	}
	

	function admin_add() {
		$this->layout = 'admin';
		$this->loadModel('Company');
		if (!empty($this->data)) {
		    if (empty($this->data['Catalog']['url']['name'])) $this->Session->setFlash('Выберите файл для загрузки', 'default', array('class' => 'error-message'));
		    else {
			$oldfile =''; 
			$optype ='add';
			$this->data['Catalog']['date_add'] = date('Y-m-d');
			$this->_load_file ($oldfile, $optype) ;
		    }				
		}
		$companies = $this->Company->find('list');
		$this->set(compact('companies'));
		$this->set('title_for_layout', 'Добавление каталога');
	}
	
	
	function admin_edit($id = null) {
		$this->layout = 'admin';
		$this->loadModel('Company');
		$this->Catalog->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Catalog->read();
		} else {
		    
			$oldfile = $this->Catalog->field('url');
			$optype ='edit';
		    	$this->_load_file ($oldfile, $optype) ;
				
		}
		$companies = $this->Company->find('list');
		$this->set(compact('companies'));
		$this->set('title_for_layout', 'Редактирование каталога');
	}
	
	
	function admin_delete($id) {
		$this->layout = 'admin';
		//удаление файла с диска
		$this->Catalog->id = $id;
		$file = $this->Catalog->field('url');
		if ($this->Catalog->delete($id)) {
			if (!empty($file)) @unlink(WWW_ROOT.'files'.DS.$file);
			$this->Session->setFlash('Файл успешно удален');
			$this->redirect(array('controller' => 'catalogs', 'admin'=> true, 'action' => 'index'));     
		}
		$this->set('title_for_layout', 'Удаление файла');
	}

}

?>