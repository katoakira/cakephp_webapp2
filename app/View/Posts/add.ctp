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
    echo $this->Form->input('Post.body');
    echo $this->Form->input('Post.img', array('label' => false, 'type' => 'file', 'multiple'));
    echo $this->Form->input('Post.price');
    echo $this->Form->input('Post.due_date');
    echo $this->Form->submit('出品', array('class' => 'btn btn-primary'));
?>

