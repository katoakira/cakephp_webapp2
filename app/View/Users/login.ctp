<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('ユーザー名とパスワードを入力してください'); ?></legend>
        <?php
             echo $this->Form->input('username', array('label' => 'ユーザー名'));
             echo $this->Form->input('password', array('label' => 'パスワード'));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('ログイン')); ?>
</div>
<div class="pageLink">
    <p><?php echo $this->Html->link('戻る', array('controller' => 'posts', 'action' => 'index'));?></p>
</div>
