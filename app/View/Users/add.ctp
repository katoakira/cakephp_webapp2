<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('新規登録'); ?></legend>  
            <?php 
                echo $this->Form->input('username',array('label' => 'ユーザー名'));
                echo $this->Form->input('password', array('label' => 'パスワード'));
            ?>
    </fieldset>
<?php
     echo $this->Form->submit('登録',
        array(
           'controller' => 'posts',
           'action' => 'index'
       ),
       array(
           'class' => 'btn btn-primary',
           'label' => '登録'
       )
    );
?>
</div>
<div class="pageLink">
    <p><?php echo $this->Html->link('戻る', array('controller' => 'posts', 'action' => 'index'));?></p>
</div>
