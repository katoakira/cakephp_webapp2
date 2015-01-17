<?php
    
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }
    
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('ユーザー名またはパスワードが間違っています。もう一度入力してください。'));
            }
        }
    }
    
    public function logout() {
        $this->redirect($this->Auth->logout());
        $this->Session->setFlash('ログアウトしました');
    }

    public function index() {
        $this->set('users', $this->paginate());
    
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('無効なユーザー'));
        }
        $this->set('user', $this->User->read(null, $id));
    
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('登録しました'));
                $this->redirect(array('controller' => 'posts', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('登録できません。もう一度入力してください。'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('編集できません'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('編集しました'));
                $this->redirect(array('controller' => 'posts', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('登録できません。もう一度入力してください'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('削除できません'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('削除しました'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('削除できません'));
        $this->redirect(array('action' => 'index'));
    }

}
