<?php 
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'UploadPack.Upload', 'Paginator');

    public $uses = array('Image', 'User', 'Post', 'Category');

    public $paginate = array( 
        'Post' => array(
            'order' => array(
                'modified' => 'DESC' 
            ),
            'limit' => 30
        )
    );

    public function isAuthorized($user) {
        if (in_array($this->action, array('edit', 'delete', 'add'))) {
            $postId = (int) $this->request->param['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    } 

    public function index() {
        $this->set($this->paginate());
        $this->set('posts', $this->Post->find('all'));
        $this->set('categories', $this->Category->find('all'));
    }


    public function categoryIndex($id = null) {

        if (!$id) {
            throw new NotFoundException(__('閲覧できません'));
        }
        $this->set($this->paginate());
        $category = $this->Category->findById($id);  
        if(!$category) {
            throw new NotFoundException(__('閲覧できません'));
        }

        $this->set('category', $category);

    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('閲覧できません'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('閲覧できません'));
        }

        $this->set('post', $post);

    }

    public function add() {
        $category = $this->Category->find('list',
            array(
                'field' => array(
                    'Category.id', 'Category.name'
                )
            )
        );
        $this->set('category', $category); 

        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id'); 

            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('出品しました'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('出品できません'));
        } 

    }

   public function edit($id = null) {
       $category = $this->Category->find('list',
            array(
                'field' => array(
                    'Category.id', 'Category.name'
                )
            )
        );
        $this->set('category', $category);
 
        if (!$id) {
            throw new NotFoundException(__('編集できません'));
        }

        $user = $this->Auth->user(); 
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('編集できません'));
        }
        
        if ($post['Post']['user_id'] !== $user['id']) {
            $this->Session->setFlash(__('編集できません'));
            return $this->redirect(array(
                'controller' => 'posts',
                'action' => 'index'
                )
            );   
        }
        $this->set('post', $post);
        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->saveAll($this->request->data)) {
                $this->Session->setFlash(__('編集しました'));
                return $this->redirect(array(
                    'controller' => 'posts',
                    'action' => 'index'
                    )
                );
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

        $user = $this->Auth->user();
        $post = $this->Post->findById($id);
        if ($post['Post']['user_id'] !== $user['id']) {
            $this->Session->setFlash(__('編集できません'));
            return $this->redirect(array(
                'controller' => 'posts',
                'action' => 'index'
                )
            );
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash(__('削除しました'));
            return $this->redirect(array(
                'controller' => 'posts',
                'action' => 'index'
                )
            );
        }
    }
} 
