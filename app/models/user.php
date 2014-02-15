<?php
class User extends AppModel {
    var $name = 'User';
	var $validate = array(        
		'username' => array( 
			'isUnique' => array(
                'rule' => 'isUnique',
                'message' => '������������ ��� ������ ������ ��� ���������������',
				'last' => true
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => '��� ������������ ����� ��������� ������ ����� � �����',
				'last' => true
            ),
            'between' => array(
                'rule' => array('between', 3, 30),
                'message' => '��� ������������ ������ ���������� �� 3 �� 30 ��������',
				'last' => true
			)
		),	
		'email' => array(
			'rule' => 'email',
            'message' => '������ ������������ e-mail �����',
			'last' => true
        ),		
		'password' => array(
			'rule' => array('minLength', '4'),
            'message' => '������ ������ ��������� �� ����� 4 ��������'
        ),
	);
	
	function beforeSave() {
        $this->data['User']['password'] = md5($this->data['User']['password']);
		unset($this->data['User']['password_confirm']);
        return true;
    }
}
?>