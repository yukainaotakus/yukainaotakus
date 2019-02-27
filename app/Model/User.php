<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    public $validate = array(
        'username' => array(
            array(
                'rule' => 'notBlank',
                'message' => '必须填写用户名'
            ),
            array(
                'rule' => 'isUnique',
                'message' => '此用户名已被注册'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => '必须填写密码'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('u', 'sr','ssr')),
                //'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
}


?>