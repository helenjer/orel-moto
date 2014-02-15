<?php
class MotofilesController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'Motofiles';
		
	function _load_file ($oldfile, $optype) {		
		$fld_name = 'motofiles/';
		$allow_formats = array ('application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','text/plain','application/rtf');
		$wrongformat = false;
		$file = $this->data['Motofile']['url'];
			if (!empty($file['name'])) { //����������� ������� ��� �������� 
				if (!in_array($file['type'],$allow_formats) && !preg_match('/(\.xls$)|(\.xlsx$)|(\.doc$)|(\.docx$)|(\.rtf$)/',$file['name'])) {
					$wrongformat = true;
				} 
				elseif ($file['error'] == 0) {
					if (!preg_match('/^[A-Za-z_0-9]+\.[A-Za-z]{3,4}$/',$file['name'],$fullname)) {
						$fullname[0] = str_replace('.','',strval(microtime(1))).substr($file['name'],-4);
					}
					$this->data['Motofile']['url'] = $fld_name.$fullname[0];			
					$f = file_get_contents($file['tmp_name']);
					file_put_contents(WWW_ROOT.'files'.DS.$this->data['Motofile']['url'],$f);
                    if (!empty($oldfile)) @unlink(WWW_ROOT.'files'.DS.$oldfile); // �������� ������� �����������					
				} else $this->Session->setFlash('������ ��� �������� �����');  
				} else 	$this->data['Motofile']['url'] = $oldfile; // ��������� ������ �����������

			if ($wrongformat) $this->Session->setFlash('������������ ������ �����. ��������� �������: DOC, DOCX, XLS, XLSX, RTF, TXT');
				elseif ($this->Motofile->save($this->data)) {
					if ($optype === 'add') {
						//�������� -> do nothing

					}
				    if ($optype === 'add') $this->Session->setFlash('�����-���� ������� ��������');
					if ($optype === 'edit') $this->Session->setFlash('�����-���� ������� ��������');
					$this->redirect(array('controller' => 'users', 'admin'=> true, 'action' => 'index'));     
					return true;
				}
	}
	
	
    function index()  {
		
    }

	function admin_add() { 
		$this->layout = 'admin';
		if (!empty($this->data)) {
		    if (empty($this->data['Motofile']['url']['name'])) $this->Session->setFlash('�������� ���� ��� ��������', 'default', array('class' => 'error-message'));
		    else {
			$oldfile =''; 
			$optype ='add';
			$this->data['Motofile']['date_add'] = date('Y-m-d');
			$this->_load_file ($oldfile, $optype) ;
		    }				
		}    
		$this->set('title_for_layout', '���������� �����-�����');
	}
	
	
	function admin_edit($id = null) {
		$this->layout = 'admin';
		$this->Motofile->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Motofile->read();
		} else {
		    
			$oldfile = $this->Motofile->field('url');
			$optype ='edit';
		    	$this->_load_file ($oldfile, $optype) ;
				
		}	
		$this->set('title_for_layout', '�������������� �����-�����');
	}
	
	
	function admin_delete($id) {
		$this->layout = 'admin';
		//�������� ����� � �����
		$this->Motofile->id = $id;
		$file = $this->Motofile->field('url');
		if ($this->Motofile->delete($id)) {
			if (!empty($file)) @unlink(WWW_ROOT.'files'.DS.$file);
			$this->Session->setFlash('���� ������� ������');
			$this->redirect(array('controller' => 'users', 'admin'=> true, 'action' => 'index'));     
		}
		$this->set('title_for_layout', '�������� �����');
	}

}

?>