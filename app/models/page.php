<?php
class Page extends AppModel {
    var $name = 'Page'; 
	
	 var $validate = array(        
		'title' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '��������� �� ������ ���� ������',
				'last' => true
			)
		),        
		'text' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '����� �� ������ ���� ������',
				'last' => true
			) 
		)		
	);
}
?>