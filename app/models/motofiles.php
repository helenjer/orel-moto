<?php

class Motofile extends AppModel {
    var $name = 'Motofile';
		var $validate = array(        
		'url' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '������� ���� � �����',
				'last' => true
			)
		),    
		'type' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '������� ��� �������',
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
		
}
?>