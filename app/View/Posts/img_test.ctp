<?php
    echo $this->Form->create->('Img_user', array('type' => 'file'));
    echo $this->Form->input('Img_user.username'); 
    echo $this->Form->input('Img_user.photo', array('type' => 'file')); 
    echo $this->Form->input('Img_user.photo_dir', array('type' => 'hidden'));
    echo $this->Form->end('Submit');
?>
