<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['post_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category Id'); ?></dt>
		<dt><?php echo __('カテゴリー名'); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('作成日時'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('最終更新日時'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('アクション'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('編集'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $category['Category']['id']), array(), __('# %sを削除してもよろしいですか？', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('カテゴリー一覧'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('追加'), array('action' => 'add')); ?> </li>
	</ul>
</div>
