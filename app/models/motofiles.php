<?php

class Motofile extends AppModel {
    var $name = 'Motofile';
		var $validate = array(        
		'url' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '”кажите путь к файлу',
				'last' => true
			)
		),    
		'type' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '”кажите тип техники',
				'last' => true
			)
		),
		'company' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '”кажите название фирмы',
				'last' => true
			)
		)
	);
		
}
?>