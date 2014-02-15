<?php
class Video extends AppModel {
    var $name = 'Video';
		public $belongsTo = array(
			'Mototechnic' => array(   
					'className' => 'Mototechnic',
					'foreignKey' => 'mototechnic_id'
			)
    );
		
		var $validate = array(        
		'url' => array( 
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '”кажите url видео',
				'last' => true
			)
		)
	);
		
	function beforeSave($created) {
		$dir_path = 'video_thumbs/';
		if (!empty($this->data['Video']['File']) && !empty($this->data['Video']['File']['name'])) 
    {
				$new_name = str_replace('.','',strval(microtime(1))).substr($this->data['Video']['File']['name'],-4);
				
        if (!move_uploaded_file($this->data['Video']['File']['tmp_name'], IMAGES.$dir_path.$new_name))
        {
					echo (11111);
            return false;
        }
        $this->data['Video']['img'] = $dir_path.$new_name;
    } else {
		}
    return true;
}

	function beforeValidate(){
      if(empty($this->data['Video']['url']) && empty($this->data['Video']['File']['name'])){ // пол€ не заполнены
         unset($this->data['Video']);
      }
      return true; //this is required, otherwise validation will always fail
			
  }
			
		
}
?>