<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('新規登録'); ?></legend>
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
            <div>
                <?php 
                    echo $this->Form->input('email',
                        array(
                            'class' => 'form-control',
                            'label' => 'Eメール',
                            'placeholder' => 'Eメールを入力してください'
                        )
                    );
                ?>
            </div>
            <div>
                <?php
                    echo $this->Form->input('password',
                        array(
                            'class' => 'form-control',
                            'label' => 'パスワード',
                            'placeholder' => 'パスワードを入力してください'
                        )
                    );
                ?>
                <?php echo "※「ユーザー名」は出品時の「投稿者名」、コメントする際に記載されるものです"; ?>
            </div>
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
    <?php
         echo $this->Html->link('戻る',
             array('controller' => 'posts', 'action' => 'index'),
             array('class' => 'btn btn-primary')
     );
    ?>

