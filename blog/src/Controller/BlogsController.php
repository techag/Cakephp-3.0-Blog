<?php

/**
 * BlogsController 
 * This controller has all blog related actions.
 * Model BLogs
 * @Author: Anand Ghaywankar <anand.ghaywankar@gmail.com>
 * @since 3.0 
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class BlogsController extends AppController {

    /**
     * Helper Array for blog views
     * @var type 
     */
    public $helpers = [
        'Paginator' => ['templates' => 'paginator-templates']
    ];

    /**
     * PAginate config array
     * @var type 
     */
    public $paginate = [
        'limit' => 5,
        'order' => [
            'Blogs.id' => 'DESC'
        ]
    ];

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
     * Welcome Action
     * This action is the landing page of app. 
     * This requires no login and displays all the blogs
     * @return object Blogs
     */
    public function welcome() {
        $query = $this->Blogs->find('All', ['contain' => ['Users']]);
        $this->set('blogs', $this->paginate($query));
    }

    /**
     * Index Action
     * This action will displays the list of blogs associated with user. 
     * This require the login. 
     * @return object Blogs
     */
    public function index() {
        $query = $this->Blogs->find('All', ['contain' => ['Topics', 'Comments']]);
        $this->set('blogs', $this->paginate($query));
    }

    /**
     * Create Action
     * 
     * This action will create and edit a blog and save in DB. This action requires login
     * 
     * @param type $id
     * @return type
     */
    public function create($id = null) {
        //When create new blog, id will be null
        if ($id == null) {
            $blog = $this->Blogs->newEntity($this->request->data);
        } else {
            //If edit, fetch blog by id
            $blog = $this->Blogs->get($id);
            
            //Need to fetch content seperatly as cake 3.0 doesnot return blob data value
            $conn = \Cake\Datasource\ConnectionManager::get('default');
            $data = $conn->prepare('SELECT content FROM blogs WHERE id=' . $id . ';');
            $data->execute();
            $this->set('content', $data->fetch('assoc'));
        }
        
        // Save Data
        if ($this->request->is(['post', 'put'])) {            
            //Associate user
            $this->request->data['user_id'] = $this->Auth->user()['id'];
            $blog = $this->Blogs->patchEntity($blog, $this->request->data);
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the blog.'));
        }

        //Send blog and content to view
        $this->set('blog', $blog);
        $topics = $this->Blogs->Topics->find('list');        
        $this->set('topics',$topics);
    }

    /**
     * Delete Action
     * 
     * This action will delete selected blog
     * 
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $blog = $this->Blogs->get($id);
        if ($this->Blogs->delete($blog)) {
            $this->Flash->success(__('The blog with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * View Action
     * 
     * This is to display the blog post
     * 
     * @param type $id
     * @throws NotFoundException
     */
    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid blog'));
        }

        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $data = $conn->prepare('SELECT content FROM blogs WHERE id=' . $id . ';');
        $data->execute();
        $this->set('content', $data->fetch('assoc'));
        $blog = $this->Blogs->get($id, ['contain' => ['Users', 'Comments']]);
        $this->set(compact('blog'));
    }

}
