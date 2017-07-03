
<section class="container-fluid content">
	<article class="col-lg-12">
		<?= $this->Form->create('newPostForm', array('enctype' => 'multipart/form-data')); ?>
		<?= $this->Form->label("title", "Title", ['class' => 'col-lg-12']); ?>
		<?= $this->Form->text('title'); ?>
		<?= $this->Form->label("text", "Text", ['class' => 'col-lg-12']); ?>
		<?= $this->Form->textarea('text', ['class' => 'col-lg-12']); ?>
		<?= $this->Form->input('picture', ['type' => 'file']); ?>
		<?= $this->Form->button('Post', ['type' => 'submit']); ?>
		<?= $this->Form->end(); ?>
	</article>

</section>