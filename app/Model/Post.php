<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {

    public $actsAs = array(
        'Search.Searchable',
        'UploadPack.Upload' => array(
            'img' => array(
                 'path' => ':webroot/img/:id/:style.:extension',
                 'styles' => array(
                    'big' => '200x200',
                    'small' => '120x120',
                    'thumb' => '80x80'
                )
            )
        ),
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
       'body' => array(
           'required' => array(
               'rule' => 'notEmpty',
               'message' => '文字を入力してください'
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

    public $filterArgs = array(
        array(
            'name' => 'search_word',
            'type' => 'query',
            'method' => 'WordSearch'
        )
    );

    public function WordSearch($data = array()) {
        $keyword = mb_convert_kana($data['search_word'], "s", "UTF-8");
        $keywords = explode(' ', $keyword);
    
        if (count($keywords) < 2) {
            $conditions = array(
                'OR' => array(
                    $this->alias.'.name LIKE' => '%' . $keyword . '%',
                    $this->alias.'.body LIKE' => '%' . $keyword . '%',
                    $this->alias.'.title LIKE' => '%' . $keyword . '%'
                )
            );
        } else {
           $conditions['AND'] = array();
               foreach ($keywords as $count => $keyword) {
                   $condition = array(
                       'OR' => array(
                           $this->alias.'.name LIKE' => '%' . $keyword . '%',
                           $this->alias.'.body LIKE' => '%' . $keyword . '%',
                           $this->alias.'.title LIKE' => '%' . $keyword . '%'
                       )
                   );
                   array_push($conditions['AND'], $condition);
               }
        }
        return $conditions;
    }
}
