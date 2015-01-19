<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('ユーザー名とパスワードを入力してください'); ?></legend>
        <div class="form-group">
            <?php 
                echo $this->Form->input('username',
                    array(
                        'class' => 'form-control',
                        'label' => 'ユーザー名',
                        'placeholder' => 'ユーザー名を入力してください'
                    )
                );
            ?>
        </div>
        <div class="form-group">
            <?php 
                echo $this->Form->input('password',
                    array(
                        'class' => 'form-control',
                        'label' => 'パスワード',
                        'placeholder' => 'パスワードを入力してください'
                    )
                ); 
            ?>
        </div>
    </fieldset>
    <?php echo $this->Form->submit('ログイン', array('class' => 'btn btn-primary')); ?>
    <?php echo $this->Form->end(); ?>
</div>
    <?php
             echo $this->Html->link('戻る',
                 array('controller' => 'posts', 'action' => 'index'),
                 array('class' => 'btn btn-primary')
             );
    ?>

