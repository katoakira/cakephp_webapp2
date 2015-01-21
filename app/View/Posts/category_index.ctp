<div class="container">
    <h1>
        <?php echo $category['Category']['name']; ?>
        <div class="btn-group pull-right">
            <?php 
                echo $this->Paginator->sort('title', 'タイトル', array(
                    'class' => 'btn btn-primary',
                    'role' => 'button'
                ));
            ?>
            <?php
                echo $this->Paginator->sort('name', '投稿者名', array(
                    'class' => 'btn btn-primary',
                    'role' => 'button'
                ));
            ?> 
            <?php
                echo $this->Paginator->sort('price', '価格', array(
                    'class' => 'btn btn-primary',
                    'role' => 'button'
                ));
            ?>
            <?php
                echo $this->Paginator->sort('modified', '最終更新日時', array(
                    'class' => 'btn btn-primary',
                    'role' => 'button'
                ));
            ?>
        </div>
    </h1>
    <hr>
    <?php foreach($category['Post'] as $post): ?>
    <ul style="list-style: none;" class="thumbnails dist-inBlock">
        <div class="col-sm-6 thumbnail" style="height: 240px width: 100%">
            <li style="height: 60px; overflow: hidden">
               <strong>
                  <?php 
                       echo $this->Html->link($post['title'],
                       array('controller' => 'posts', 'action' => 'view',$post['id'])
                       );
                   ?>
                </strong>
            </li>
            <div class="col-sm-5">
                <li>
                    <?php echo $this->Upload->uploadImage($post, 'Post.img',
                              array('style' => 'thumb'),
                              array('url' => array(
                                  'controller' => 'posts',
                                  'action' => 'view',
                                  $post['id']))
                          );
                    ?>
                 </li>
            </div>
            <div class="col-sm-7"> 
                <li>投稿者名：<?php echo $post['name']; ?></li>
                <li>価格：¥<?php echo $post['price']; ?></li>
                <li>最終更新日時：<?php echo $post['modified']; ?></li>
                <li>
                    <?php
                        echo $this->Form->postLink(
                             '削除',
                             array('action' => 'delete', $post['id']),
                             array(
                                 'confirm' => '削除してもよろしいですか',
                                 'class' => 'btn btn-danger pull-right'
                             )
                         );
                    ?>
                    <?php
                        echo $this->Html->link(
                             '編集', 
                             array('action' => 'edit', $post['id']),
                             array('class' => 'btn btn-success pull-right')
                        );
                    ?>
               </li>
            </div>
        </div>
    </ul>
    <?php endforeach; ?>
    <?php unset($post); ?>
    
    <br clear="all">
    
    <div class="pagination" style="text-align: center">
        <?php
            echo $this->Paginator->prev('< 前へ', array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next('次へ >', array(), null, array('class' => 'next disabled'));
        ?> 
        <?php
             echo $this->Paginator->counter(array('format' => '全%count%件' )); 
             echo $this->Paginator->counter(array('format' => '{:page}/{:pages}ページを表示'));
        ?>
    </div>
    <?php 
        echo $this->Html->link('戻る',
            array('action' => 'index'),
            array('class' => 'btn btn-primary pull-right')
        );
    ?>
</div>
