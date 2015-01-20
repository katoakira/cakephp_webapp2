<?php debug($post); debug($user); ?>
<div class="container">
<h1><?php echo h($post['Post']['title']); ?></h1>
    <div class="row">
        <div class="col-sm-5">
            <p><?php echo $this->Upload->uploadImage($post['Post'], 'Post.img', array('style' => 'big')); ?></p>
        </div> 
        <div class="col-sm-7">
            <p>カテゴリー名：<?php echo h($post['Category']['name']); ?></p>
            <p>投稿者名：<?php echo h($post['User']['username']); ?></p>
            <p>価格：¥<?php echo $post['Post']['price']; ?></p>
            <p>最終更新日時：<?php echo $post['Post']['modified']; ?></p>
        </div>

        <div class="col-sm-12">
            <p>紹介文</p>
            <p><?php echo h($post['Post']['body']); ?></p>
            <hr>
            <?php 
                echo $this->Form->create('Comment',array(
                    'class' => 'form-group'
                ));
                echo $this->Form->input('body', array(
                    'label' => 'コメント',
                    'placeholder' => 'コメントを入力してください',
                    'class' => 'form-control'));
                echo $this->Form->submit('送信', array(
                    'class' => 'btn btn-primary'
                ));
                echo $this->Form->end();
            ?>
            
            <hr>
            
            <?php foreach($post['Comment'] as $comments): ?>
            <ul style="list-style: none;">
                <li>
                    <?php if($user['id'] == $comments['user_id']): ?>
                        <div class="popover left show" style="position: relative; max-width:100%;">
                        <div class="arrow"></div>
                           <p class="popover-title">
                           <small><?php echo $comments['created']; ?></small>
                                By
                               <?php echo $comments['username']; ?>
                           </p>
                           <p class="popover-content"><?php echo $comments['body']; ?></p>
                        </div>
                    <?php else: ?>
                         <div class="popover right show" style="position: relative; max-width:100%;">
                         <div class="arrow"></div>
                            <p class="popover-title">
                            <small><?php echo $comments['created']; ?></small>
                                By
                                <?php echo $comments['username']; ?>
                            </p>
                            <p class="popover-content"><?php echo $comments['body']; ?></p>
                         </div>
                    <?php endif; ?>
                </li>
            </ul>
            <?php endforeach; ?>
            
            <hr> 
            
            <?php 
                echo $this->Html->link( $post['Category']['name'] . 'へ戻る', 
                    array('controller' => 'posts', 'action' => 'categoryIndex', $post['Category']['id']),
                    array('class' => 'btn btn-primary')
                );
            ?>
            <?php 
                echo $this->Html->link('TOPへ戻る',
                    array('controller' => 'posts', 'action' => 'index'),
                    array('class' => 'btn btn-primary')
                );
            ?>
        </div>
</div>
