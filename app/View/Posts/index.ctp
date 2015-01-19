<!-- 商品一覧TOP -->
<h1>TOP</h1>
<?php
    echo $this->Html->link(
        '出品',
        array('controller' => 'posts', 'action' => 'add'),
        array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 20px; margin-left: 10px')
    );
?>

<hr>

<?php
    echo $this->Form->create('Post',
        array(
            'controller' => 'posts',
            'action' => 'index',
            'type' => 'post'
        )
    );
    echo $this->Form->input('search_word', array('label' => false, 'div' => false));
    echo $this->Form->end('検索'); 
?>

<hr>

<?php foreach ($categories as $category): ?>
<ul>
    <li>
        <?php echo $this->Html->link(
            $category['Category']['name'],
                array(
                    'controller' => 'posts',
                    'action' => 'categoryIndex',
                    $category['Category']['id']
                )
            );
        ?>
    </li>
</ul>
<?php endforeach; ?>
<?php unset($category); ?>

<h2>商品一覧</h2>
<table class="table table-striped table-borederd table-hover table-condensed">
    <tr>
        <th><?php echo $this->Paginator->sort('Post.title', 'タイトル'); ?></th>
        <th><?php echo $this->Paginator->sort('Post.name', '投稿者名'); ?></th>
        <th>カテゴリー名</th>
        <th><?php echo $this->Paginator->sort('Post.price', '価格'); ?></th>
        <th><?php echo $this->Paginator->sort('Post.modified', '最終更新日時'); ?></th>
        <th>イメージ</th>
        <th>アクション</th>
    </tr>

    <?php foreach ($posts as $post): ?>
    <tr>
        <td>
            <?php 
                echo $this->Html->link(
                    $post['Post']['title'],
                        array(
                            'controller' => 'posts',
                            'action' => 'view',
                            $post['Post']['id']
                        )
                    );
            ?>
        </td>
        <td><?php echo h($post['Post']['name']); ?></td>
        <td><?php echo h($post['Category']['name']); ?></td>
        <td>¥<?php echo h($post['Post']['price']); ?></td>
        <td><?php echo h($post['Post']['modified']); ?></td>
        <td><?php echo $this->Upload->uploadImage($post['Post'],'Post.img',array('style' => 'thumb')); ?></td>
        <td>
            <?php echo $this->Form->postLink(
                '削除',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => '削除してもよろしいですか？'));
            ?>
            <?php echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id'])); ?>
       </td>  
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
<?php 
    echo $this->Paginator->prev('< 前へ', array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => '')); 
    echo $this->Paginator->next('次へ >', array(), null, array('class' => 'next disabled'));
?>
<?php
     echo $this->Paginator->counter(array('format' => '全%count%件' ));
     echo $this->Paginator->counter(array('format' => '{:page}/{:pages}ページを表示'));
?>

