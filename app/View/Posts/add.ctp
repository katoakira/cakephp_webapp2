<h1>出品</h1>
<?php $errorMessages = $this->validationErrors['Post']; ?>
<div>  
    <ul>
        <?php foreach($errorMessages as $messages): ?>
            <?php foreach($messages as $message): ?>
                <li><?php echo h($message); ?></li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>
</div>
<h2>入力フォーム</h2>
<div>
<?php
    echo $this->Form->create('Post', array('type' => 'file'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->input('title', array('placeholder' => 'タイトルを入力してください'));
    echo $this->Form->input('name', array('placeholder' => '名前を入力してください'));
    echo $this->Form->input('Category.Category', array('label' => false, 'multiple' => 'checkbox', 'options' => 'categoryList')); 
    echo $this->Form->input('body', array('placeholder' => '文字を入力してください'));
    echo $this->Form->input('Image.image', array('type' => 'file'));
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
</div>
<div class="pageLink">
    <p><?php echo $this->Html->link('戻る', array('controller' => 'posts', 'action' => 'index'));?></p>
</div>
