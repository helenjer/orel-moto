<?php
class News extends AppModel {
    var $name = 'News';
		var $validate = array(        
		'text' => array( 
		'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Заполните описание новости',
				'last' => true
			)
		)
	);
		
}
?>