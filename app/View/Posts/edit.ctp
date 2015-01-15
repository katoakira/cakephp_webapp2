<?php debug($post);
      debug($user);?>
<h1>編集</h1>
<?php
    echo $this->Form->create('Post', array('type' => 'file'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->inout('name', array('type' => 'hidden'));
    echo $this->Form->input('title', array(
        'placeholder' => 'タイトルを入力してください',
        'label' => 'タイトル'
        ));
    echo $this->Form->input('category_id',array(
            'type' => 'select',
            'options' => $category,
            'label' => 'カテゴリ選択'
        ));
    echo $this->Form->input('body', array(
        'placeholder' => '文字を入力してください',
        'label' => '紹介文'));
    echo $this->Form->file('img', array('label' => '画像'));
    echo $this->Form->input('price', array('label' => '価格'));
    echo $this->Form->submit('編集',
        array(
           'controller' => 'posts',
            'action' => 'index'
        ),
        array(
            'class' => 'btn btn-primary'
        )
    );
?>
</div>
<div class="pageLink">
    <p><?php echo $this->Html->link('戻る', array('controller' => 'posts', 'action' => 'index'));?></p>
</div>




