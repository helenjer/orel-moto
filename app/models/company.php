<?php

class Company extends AppModel {
    var $name = 'Company';
		public $hasMany = array(
        'Catalog' => array(
            'className' => 'Catalog',
            'foreignKey' => 'company_id',
            'order' => 'Catalog.id DESC',
            'dependent' => true
        )
    );
				
		var $validate = array(        
		'name' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '”кажите им€ фирмы латиницей',
				'last' => true
			)
		),    
		'title' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '”кажите название фирмы',
				'last' => true
			)
		)
	);
		
}
?>