<?php
class Mototechnic extends AppModel {
    var $name = 'Mototechnic';
		public $hasMany = array(
        'Video' => array(
            'className' => 'Video',
            'foreignKey' => 'mototechnic_id',
            'order' => 'Video.id DESC',
            'dependent' => true
        )
    );

		var $validate = array(        
		'type' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Укажите тип модели',
				'last' => true
			)
		),    
		'model' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Укажите наименование модели',
				'last' => true
			)
		),   
		'full_txt' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Укажите характеристики модели (подробное описание)',
				'last' => true
			)
		),
		'weight' => array( 
			'notEmpty' => array(
                'rule' => 'numeric',
                'message' => 'Вес должен быть числом',
				'last' => true
			)
		),
		'company' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Укажите фирму',
				'last' => true
			) 
		)		
	);
		
}
?>