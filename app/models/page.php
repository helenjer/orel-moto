<?php
class Page extends AppModel {
    var $name = 'Page'; 
	
	 var $validate = array(        
		'title' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Заголовок не должен быть пустым',
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