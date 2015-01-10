<?php 
App::uses('AppModel', 'Model');

class Img_user extends AppModel {
    public $actsAs = array(
           'Upload.Upload' => array(
                   'photo' => array(
                       'fields' => array(
                                'dir' => 'photto_dir'
                       )  
                   )
           )
    );
}
