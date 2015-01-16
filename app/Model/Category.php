<?php
App::uses('AppModel', 'Model');
class Category extends AppModel {
    
    public $hasMany = array('Post');

}
