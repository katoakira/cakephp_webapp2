<!-- 商品一覧TOP -->
<h1>TOP</h1>
<?php
    echo $this->Html->link(
        '出品',
        array('controller' => 'posts', 'action' => 'add'),
        array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 20px; margin-left: 10px')
    );
?>
<?php foreach ($categories as $category): ?>
<ul>
    <li><?php echo $category['Category']['name']; ?></li>
</ul>
<?php endforeach; ?>

<h2>商品一覧</h2>
<table class="table table-striped table-borederd table-hover table-condensed">
    <tr>
        <th>Title</th>
        <th>Name</th>
        <th>DueDate</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

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
