<?php

/*
 * Users controller to handle users operations. 
 * This controller cotains all User related action.
 * @Author: Anand Ghaywankar (anand.ghaywankar@gmail.com)
 * @Created: 3-Apr-2015
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class UsersController extends AppController {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    /**
     * 
     * @return void
     */
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow('logout');
    }

    
    /**
     * Helper for view. 
     * @var Array 
     */
    public $helpers = [
        'Paginator' => ['templates' => 'paginator-templates']
    ];
    
    /**
     * Paginate configureation array
     * @var Array 
     */
    public $paginate = [
        //'fields' => ['users.id', 'users.email', 'users.created'],
        'limit' => 25,
        'order' => [
            'users.id' => 'asc'
        ]
    ];

    
    /**
     * User Login action. 
     * @return type
     */
    public function login() {
        //If already login, redirect to welcome
        if ($this->Auth->user()) {
            $this->redirect('/blogs/welcome');
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    /**
     * Logout action.
     * @return type
     */
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Sign Up action.
     * This will register the user and will allow to login.
     * @return type
     */
    public function sign_up() {
        //Redirect to blogs is already login
        if ($this->Auth->user()) {
            $this->redirect('/blogs/index');
        }
        $user = $this->Users->newEntity($this->request->data);
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }

}
