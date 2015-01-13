<?php 
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');

    public $uses = array('Attachment', 'Img_user', 'User', 'Post', 'Category') ;

    public function isAuthorized($user) {
//        // 登録済ユーザーは投稿できる
//        if ($this->action === 'add') {
//            return true;
//        }
//    
//        // 投稿のオーナーは編集や削除ができる
//        if (in_array($this->action, array('edit', 'delete'))) {
//            $postId = (int) $this->request->params['pass'][0];
//            if ($this->Post->isOwnedBy($postId, $user['id'])) {
//                return true;
//            }
//        }
        if (in_array($this->action, array('edit', 'delete', 'add'))) {
            $postId = (int) $this->request->param['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    } 

    public function index() {
        $this->set('posts', $this->Post->find('all'));
        $this->set('categories', $this->Category->find('all'));
    }

    public function img_test() {
        $this->Img_user->save($this->request->data);
    }


    public function view($id = null) {
           if (!$id) {
               throw new NotFoundException(__('Invalid post'));
           }

           $post = $this->Post->findById($id);
           if (!$post) {
               throw new NotFoundException(__('Invalid post'));
           }
           $this->set('post', $post);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
            $this->Post->create();
            if ($this->Post->saveall($this->request->data)) {
                $path = '/var/www/html/02_cakephp/app/webroot/img';
                $image = $this->request->data['Post']['img']; 
                $this->Session->setFlash(__('出品しました'));
                move_upload_file($image['img']);
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('出品できません'));
        } 
    }

   public function edit($id = null) {
       if (!$id) {
           throw new NotFoundException(__('Invalid post'));
       }

       $post = $this->Post->findById($id);
       if (!$post) {
           throw new NotFoundException(__('Invalid post'));
       }

       if ($this->request->is(array('post', 'put'))) {
           $this->Post->id = $id;
           if ($this->Post->save($this->request->data)) {
               $this->Session->setFlash(__('編集しました'));
               return $this->redirect(array('action' => 'index'));
           }
           $this->Session->setFlash(__('編集できません'));
       }

       if (!$this->request->data) {
           $this->request->data = $post;
       }
   }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
    
        if ($this->Post->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'index'));
        }
    }
} 
