<h1><?php echo $category['Category']['name']; ?></h1>
<table class="table table-striped table-borederd table-hover table-condensed">
    <tr>
        <th><?php echo $this->Paginator->sort('title', 'タイトル');?></th>
        <th>名前</th>
        <th><?php echo $this->Paginator->sort('due_date', '掲載終了日時'); ?></th>
        <th><?php echo $this->Paginator->sort('price', '価格'); ?></th>
        <th><?php echo $this->Paginator->sort('modified', '最終更新日時'); ?></th>
        <th>イメージ</th>
        <th>Action</th>
    </tr>

<?php foreach($category['Post'] as $post): ?>
<tr>
    <td>
        <?php 
            echo $this->Html->link($post['title'],
            array('controller' => 'posts', 'action' => 'view',$post['id'])
            );
        ?>
    </td>
        <td><?php echo $post['name']; ?></td>
        <td><?php echo $post['due_date']; ?></td>
        <td>¥<?php echo $post['price']; ?></td>
        <td><?php echo $post['modified']; ?></td>
        <td><?php echo $this->Upload->uploadImage($post, 'Post.img', array('style' => 'thumb')); ?></td>
        <td>
            <?php echo $this->Form->postLink(
                '削除',
                array('action' => 'delete', $post['id']),
                array('confirm' => '削除してもよろしいですか'));
            ?>
            <?php echo $this->Html->link('編集', array('action' => 'edit', $post['id'])); ?>
       </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table> 
<div class="pageLinks">
    <p><?php echo $this->Html->link('戻る', array('action' => 'index')); ?></p>
</div>
