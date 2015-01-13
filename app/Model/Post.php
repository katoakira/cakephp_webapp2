<?php
     class Post extends AppModel {

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


        //var $validate = array(  
        //    'img' => array(  
        ////○○キロバイト以下のファイルでアップロードしてください。  
        //        'maxSize' => array(  
        //            'rule' => array('attachmentMaxSize', 1048576),  
        //            'message' => '1MB以下のファイルでアップロードしてください'  
        //        ),  
        ////○○キロバイト以上のファイルでアップロードしてください。(あまりにも小さいファイルはアップロードさせない)  
        //        'minSize' => array(  
        //            'rule' => array('attachmentMinSize', 1024),  
        //            'message' => '1KB以上のファイルでアップロードしてください'  
        //        )  
        //    )  
        // );  

//         public $hasMany = array('Table_attachment');

         public $name = 'Post';
            
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

 //        public $hasAndBelongsToMany = array('Category');
        
         public $hasOne = array('Image');

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
