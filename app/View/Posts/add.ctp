<!--
<h1>Add Post</h1>
<?php
    echo $this->Form->create('Post');
    echo $this->Form->input('title');
    echo $this->Form->input('body', array('rows' => '3'));
    echo $this->Form->end('Save Post');
?>
-->
<h1>出品</h1>
<?php
    echo $this->Form->create('Post', array('type' => 'file', 'enctype' => 'multipart/form-data'));
    echo $this->Form->input('Post.title');
    echo $this->Form->input('Post.name');
//    echo $this->Form->input('') //カテゴリー選択
    echo $this->Form->input('body');
//    echo $this->Form->input('photo', array('type' => 'file'));
    echo $this->Form->input('price');
    echo $this->Form->input('due_date');
    //    echo $this->Form->input('photo_dir', array('type' => 'hidden'));
    echo $this->Form->hidden('Image.0.model', array('value'=>'Person'));
    echo $this->Form->input('Image.0.photo_person', array('type' => 'file'));
    echo $this->Form->input('Image.0.name', array('type' => 'file'));
    echo $this->Form->submit('出品', array('class' => 'btn btn-primary'));
    echo $this->Form->input('Image.0.name', array('type' => 'file')); 
    echo $this->Form->hidden('Image.0.model', array('value'=>'Person'));
    echo $this->Form->input('Image.0.photo_person', array('type' => 'file')); 
?>

