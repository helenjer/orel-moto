<?php
class Partner extends AppModel {
    var $name = 'Partner';
	 var $validate = array(        
		'name' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Имя не должно быть пустым',
				'last' => true
			)
		),        
		'text' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Текст не должен быть пустым',
				'last' => true
			) 
		)		
	);
		
}
?>