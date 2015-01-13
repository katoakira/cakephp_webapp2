<?php debug($category); ?>
<h1>出品</h1>
<?php
    echo $this->Form->create('Post', array('type' => 'file'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->input('title', array('placeholder' => 'タイトルを入力してください'));
    echo $this->Form->input('name', array('placeholder' => '名前を入力してください'));
    echo $this->Form->input('category_id', 
        array(
            'type' => 'select',
            'options' => $category,
            'label' => 'カテゴリ選択'
        )
    ); 
    echo $this->Form->input('body', array('placeholder' => '文字を入力してください'));
    echo $this->Form->file('img');
    echo $this->Form->input('price');
    echo $this->Form->input('due_date');
    echo $this->Form->submit('出品', array('action' => 'index'), array('class' => 'btn btn-primary'));
?>
</div>
<div class="pageLink">
    <p><?php echo $this->Html->link('戻る', array('controller' => 'posts', 'action' => 'index'));?></p>
</div>
