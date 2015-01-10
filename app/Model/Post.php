<?php
     class Post extends AppModel {
         public $belongsTo = array('Category');

         public $validate = array(
            'title' => array(
                'required' => array(
                    'rule' => 'notEmpty',
                    'message' => 'タイトルを入力してください'
                 )
             ),
            'name' => array(
                'required' => array(
                    'rule' => 'notEmpty',
                    'message' => '名前を入力してください'
                )
            ),
            'body' => array(
                'required' => array(
                    'rule' => 'notEmpty',
                    'message' => '文字を入力してください'
                )
            ),
            'due_date' => array(
                'required' => array(
                  'rule' => 'notEmpty',
                  'message' => '締切日を入力してください'
                )
            )
        );
         
         public function isOwnedBy($post, $user) {
             return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
          }
     }
