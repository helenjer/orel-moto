<?php
class Partner extends AppModel {
    var $name = 'Partner';
	 var $validate = array(        
		'name' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '��� �� ������ ���� ������',
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