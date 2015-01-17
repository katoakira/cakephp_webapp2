<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('カテゴリー編集'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('編集')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $this->Form->value('Category.id')), array(), __('# %sを削除してもよろしいですか？', $this->Form->value('Category.id'))); ?></li>
		<li><?php echo $this->Html->link(__('カテゴリー一覧'), array('action' => 'index')); ?></li>
	</ul>
</div>
