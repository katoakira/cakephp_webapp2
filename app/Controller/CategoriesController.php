<?php
App::uses('AppController', 'Controller');
class CategoriesController extends AppController {
	public $components = array('Paginator', 'Session');

	public function index() {
        $this->set('categories', $this->Category->find('all'));
	}

	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('無効なカテゴリー'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('カテゴリーを追加しました'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('カテゴリーを追加できません。もう一度入力してください。'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('無効なカテゴリー'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('カテゴリーを編集しました'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('カテゴリーを編集できません。もう一度入力してください。'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
	}

	public function delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('無効なカテゴリー'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete()) {
            $this->Session->setFlash(__('カテゴリーを削除しました'));
            $this->redirect(array('action' => 'index'));
		} else {
            $this->Session->setFlash(__('カテゴリーを削除できません。もう一度入力してください。'));
		}
	}
}
