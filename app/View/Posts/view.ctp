<h1><?php echo h($post['Post']['title']); ?></h1>
<p>カテゴリー名：<?php echo h($post['Category']['name']); ?></p>
<p>投稿者名：<?php echo h($post['User']['username']); ?></p>
<p>価格：¥<?php echo $post['Post']['price']; ?></p>
<p>最終更新日時：<?php echo $post['Post']['modified']; ?></p>
<p><?php echo $this->Upload->uploadImage($post['Post'], 'Post.img', array('style' => 'big')); ?></p>
<p>紹介文：<?php echo h($post['Post']['body']); ?></p>

<hr>

<?php 
    echo $this->Form->create('Comment');
    echo $this->Form->input('body', array('label' => 'コメント', 'placeholder' => 'コメントを入力してください'));
    echo $this->Form->submit('送信');
?>

<hr>

<?php foreach($post['Comment'] as $comments): ?>
<ul>
    <li>
         <?php echo $comments['username']; ?>：<?php echo $comments['body']; ?>
    </li>
</ul>
<?php endforeach; ?>

<hr> 

<div class="pageLink">
    <p>
        <?php echo $this->Html->link( $post['Category']['name'] . 'へ戻る', array('controller' => 'posts', 'action' => 'categoryIndex', $post['Category']['id']));?></p>
</div>
<div class="pageLink">
    <p><?php echo $this->Html->link('戻る', array('controller' => 'posts', 'action' => 'index'));?></p>
</div>
