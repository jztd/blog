<section class="container-fluid content">
	<div class="col-lg-12">
	<?= $this->Form->create("user", []); ?>
	<div class="col-lg-12">
	<?= $this->Form->label("username", "User Name"); ?>
	<?= $this->Form->text("username"); ?>
	</div>
	<div class="col-lg-12">
	<?= $this->Form->label("password", "Password"); ?>
	<?= $this->Form->password("password"); ?>
	</div>
	<div class="col-lg-12">
	<?= $this->Form->label("email", "email"); ?>
	<?= $this->Form->text("email"); ?>
	</div>
	<div class="col-lg-12">
	<?= $this->Form->button("Submit", ['type' => 'submit']); ?>
	</div>
	<?= $this->Form->end(); ?>
	</div>
</section>