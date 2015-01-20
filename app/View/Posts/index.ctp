<!-- 商品一覧TOP -->
<!--<div class="container">-->
    <div class="row">
        <div class="col-sm-12">
            <h4>流れ</h4>
            <p>１：出品</p>
            <p>２：コメント欄で交渉</p>
            <p>３：商品受け渡し</p>
        </div>

        <div class="col-sm-2">
            <h3>カテゴリー一覧</h3>
            <ul class="list-group">
            <?php foreach ($categories as $category): ?>
                <li class="list-group-item">
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
            <?php endforeach; ?>
            </ul>
            <?php unset($category); ?>
        </div>

        <div class="col-sm-8">
            <h2>
                商品一覧
                <div class="btn-group pull-right">
                    <?php
                        echo $this->Paginator->sort('Post.title', 'タイトル', array(
                            'class' => 'btn btn-primary',
                            'role' => 'button'
                        )); 
                    ?>
                    <?php 
                        echo $this->Paginator->sort('Post.name', '投稿者名', array(
                            'class' => 'btn btn-primary',
                            'role' => 'button'
                        ));
                     ?>
                    <?php
                        echo $this->Paginator->sort('Post.price', '価格', array(
                            'class' => 'btn btn-primary',
                            'role' => 'button'
                        ));
                     ?>
                    <?php 
                        echo $this->Paginator->sort('Post.modified', '最終更新日時', array(
                            'class' => 'btn btn-primary',
                            'role' => 'button'
                        ));
                    ?>
                </div>
            </h2>
            <hr>                
            <?php foreach ($posts as $post): ?>
                <ul style="list-style: none;" class="thumbnails disp-inBlock">
                    <div class="col-sm-6 thumbnail">
                            <li style="text-align: center;">
                            <strong>
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
                            </strong>
                            </li> 
                        <div class="col-sm-6">
                            <li>
                               <?php
                                    echo $this->Upload->uploadImage($post['Post'],'Post.img',
                                        array('style' => 'thumb'),
                                        array('url' => array(
                                            'controller' => 'posts',
                                            'action' => 'view',
                                            $post['Post']['id']))
                                    );
                                ?> 
                            </li>
                        </div>
                        <div class="col-sm-6">
                            <li>投稿者名：<?php echo h($post['Post']['name']); ?></li>
                            <li>カテゴリー：<?php echo h($post['Category']['name']); ?></li>
                            <li>価格：¥<?php echo h($post['Post']['price']); ?></li>
                            <li>最終更新日時：<?php echo h($post['Post']['modified']); ?></li>
                            <li>    
                                <?php echo $this->Form->postLink(
                                    '削除',
                                    array('action' => 'delete', $post['Post']['id']),
                                    array('confirm' => '削除してもよろしいですか？'));
                                ?>
                                <?php echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id'])); ?>
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
        </div>

        <div class="col-sm-2">
            <?php
                echo $this->Form->create('Post',
                    array(
                        'controller' => 'posts',
                        'action' => 'index',
                        'type' => 'post'
                    )
                );
            ?>
            <div class="input-group">
                <?php 
                    echo $this->Form->input('search_word', array(
                        'label' => false,
                        'placeholder' => '文字を入力してください',
                        'class' => 'form-control'
                        ));
                ?>
                <span class="input-group-btn">
                   <?php echo $this->Form->submit('検索', array('class' => 'btn btn-primary')); ?>
                </span>
            </div>
            <?php echo $this->Form->end();?>
            <hr>
            <?php
                echo $this->Html->link(
                    '出品',
                    array(
                        'controller' => 'posts',
                        'action' => 'add'
                    ),
                    array(
                        'class' => 'btn btn-warning',
                    )
                );
            ?> 
        </div>
    </div>
<!--</div>-->
