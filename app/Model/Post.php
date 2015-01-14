<?php
     class Post extends AppModel {
        
         public $name = 'Post';

         public $actsAs = array(
             'UploadPack.Upload' => array(
                 'img' => array(
                      'path' => ':webroot/img/:id/:style.:extension',
                      'styles' => array(
                         'big' => '200x200',
                         'small' => '120x120',
                         'thumb' => '80x80'
                      )
                 )
             )
         );
            
         public $belongsTo = array(
              'User' => array(
                  'className' => 'User',
                  'foreignKey' => 'user_id'
              ),
              'Category' => array(
                  'className' => 'Category',
                  'foreignKey' => 'category_id'
              )
          );
        
         public $hasMany = array(
             'Comment' => array(
                 'className' => 'Comment',
                 'foreignKey' => 'post_id'
             )
         );

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
                  'message' => '掲載終了日時をを入力してください'
                )
            ),
            'price' => array(
                'required' => array(
                    'rule' => 'notEmpty',
                    'message' => '価格を入力してください'
                )
            )
        );
         
         public function isOwnedBy($post, $user) {
             return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
          }
     }
