<?php

class Catalog extends AppModel {
    var $name = 'Catalog';
		 public $belongsTo = array(
        'Company' => array(
            'className' => 'Company',
            'foreignKey' => 'company_id'
        )
    );
				
		var $validate = array(        
		'url' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '������� ���� � �����',
				'last' => true
			)
		),    
		'title' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '������� ��������',
				'last' => true
			)
		),
		'company' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '������� �������� �����',
				'last' => true
			)
		)
	);
		
		
	function beforeSave($created) {
		if (!empty($this->data['Catalog']['File']) && !empty($this->data['Catalog']['File']['name'])) 
    {
				$new_name = str_replace('.','',strval(microtime(1))).substr($this->data['Catalog']['File']['name'],-4);
				

    } else {
		}
    return true;
}

	function beforeValidate(){
      if(empty($this->data['Catalog']['url']) && empty($this->data['Catalog']['File']['name'])){ // ���� �� ���������
         unset($this->data['Catalog']);
      }
      return true; //this is required, otherwise validation will always fail
			
  }
		
}
?>