<div class="users form">
<div class="container" style="padding:10px 0">
<?php echo $this->Session->flash('auth'); ?>
<?php
    echo $this->Form->create('User',array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'wrapInput' => 'false',
            'class' => 'form-control'
        ),
        'class' => 'well form-horizontal'
    ));
?>
    <fieldset>
        <legend><?php echo __('ユーザー名とパスワードを入力してください'); ?></legend>
            <?php
                echo $this->Form->input('username',
                    array(
                        'label' => 'ユーザー名',
                        'placeholder' => 'ユーザー名'
                    )
                );
            ?>
            <?php
                echo $this->Form->input('password',
                    array(
                        'label' => 'パスワード',
                        'placeholder' => 'パスワード'
                    )
                );
            ?>
    </fieldset>
    <div class="btn-group">
    <?php echo $this->Form->submit('ログイン', array('class' => 'btn btn-primary')); ?>              
    <?php
         echo $this->Html->link('戻る',
             array('controller' => 'posts', 'action' => 'index'),
             array('class' => 'btn btn-primary')
         );
     ?>
    <?php echo $this->Form->end(); ?>
    </div>
</div>
