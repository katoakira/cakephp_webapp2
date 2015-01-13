<?php debug($post); ?>
<h1><?php echo h($post['Post']['title']); ?></h1>
<p>カテゴリー名：<?php echo h($post['Category']['name']); ?></p>
<p>投稿者名：<?php echo h($post['Post']['name']); ?></p>
<p>掲載終了日時：<?php echo $post['Post']['due_date']; ?></p>
<p>価格：<?php echo $post['Post']['price']; ?></p>
<p>最終更新日時：<?php echo $post['Post']['modified']; ?></p>
<p><?php echo $this->Upload->uploadImage($post['Post'], 'Post.img', array('style' => 'big')); ?></p>
<p>紹介文：<?php echo h($post['Post']['body']); ?></p>
<div class="pageLink">
    <p>
        <?php echo $this->Html->link( $post['Category']['name'] . 'へ戻る', array('controller' => 'posts', 'action' => 'categoryIndex', $post['Category']['id']));?></p>
</div>
<div class="pageLink">
    <p><?php echo $this->Html->link('戻る', array('controller' => 'posts', 'action' => 'index'));?></p>
</div>
