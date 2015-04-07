<?php

/**
 * Comments Controller
 * This has comments related actions
 * 
 * @author Anand Ghaywankar <anand.ghaywankar@gmail.com>
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class CommentsController extends AppController {

    public function initialize() {
        parent::initialize();
    }

    /**
     * Add Comment Action
     * @param type $blog_id
     * @return type
     * @throws NotFoundException
     */
    public function add($blog_id) {
        if (!$blog_id) {
            throw new NotFoundException(__('Invalid comment'));
        }
        $comment = $this->Comments->newEntity($this->request->data);
        if ($this->request->is(['post', 'put'])) {
            $this->request->data['blog_id'] = $blog_id;            
            $comment = $this->Comments->patchEntity($comment, $this->request->data);
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('You have successfully added your comment!'));
                return $this->redirect(['controller'=>'Blogs','action' => '/view/' . $blog_id]);
            }
            $this->Flash->error(__('Unable to post your comment.'));
        }
    }

}
