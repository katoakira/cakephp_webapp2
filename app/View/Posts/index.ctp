<!-- 
<h1>Blog posts</h1>
<?php echo $this->Html->link('Add Post',array('controller' => 'posts', 'action' => 'add')); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

     ここから、$posts配列をループして、投稿記事の情報を表示

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?'));
            ?> 
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
        </td> 
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
-->
<!-- 商品一覧TOP -->
<h1>TOP</h1>
<?php
    echo $this->Html->link(
        '出品',
        array('controller' => 'posts', 'action' => 'add'),
        array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 20px; margin-left: 10px')
    );
?>
<table class="table table-striped table-borederd table-hover table-condensed">
    <tr>
        <th>Title</th>
        <th>Name</th>
        <th>DueDate</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['name']; ?></td>
        <td><?php echo $post['Post']['due_date']; ?></td>
        <td><?php echo $post['Post']['price']; ?></td>
        <td><?php echo $post['Post']['img']; ?></td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
       </td>  
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
