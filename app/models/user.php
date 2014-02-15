<?php
class User extends AppModel {
    var $name = 'User';
	var $validate = array(        
		'username' => array( 
			'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Пользователь под данным именем уже зарегистрирован',
				'last' => true
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'Имя пользователя может содержать только буквы и цифры',
				'last' => true
            ),
            'between' => array(
                'rule' => array('between', 3, 30),
                'message' => 'Имя пользователя должно составлять от 3 до 30 символов',
				'last' => true
			)
		),	
		'email' => array(
			'rule' => 'email',
            'message' => 'Введен некорректный e-mail адрес',
			'last' => true
        ),		
		'password' => array(
			'rule' => array('minLength', '4'),
            'message' => 'Пароль должен содержать не менее 4 символов'
        ),
	);
	
	function beforeSave() {
        $this->data['User']['password'] = md5($this->data['User']['password']);
		unset($this->data['User']['password_confirm']);
        return true;
    }
}
?>