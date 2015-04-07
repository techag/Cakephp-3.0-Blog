<?php

/*
 * User Model
 * User Model associated with users table contains the assiciation with other related tables.
 * @Author: Anand Ghaywankar (anand.ghaywankar@gmail) 
 * @CreatedOn: 3-Apr-2015
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Entity;

class UsersTable extends Table {

    public function initialize(array $config) {
        $this->primaryKey('id');
    }

    public function validationDefault(Validator $validator) {
        return $validator
                        ->notEmpty('first_name', 'Please enter your first name.')
                        ->notEmpty('last_name', 'Please enter your last name.')
                        ->notEmpty('display_name', 'Pleae enter the name you want to display..')
                        ->notEmpty('email', 'Email address is required')
                        ->notEmpty('password', 'Email address is required')                        
                        ->add('email', [
                            'unique' => [
                                'rule' => ['validateUnique', ['scope' => 'email']],
                                'provider' => 'table'
                            ]
        ]);
    }

}
