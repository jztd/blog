<section class="container-fluid content">
	<table class="col-lg-12 table table-striped">
		<thead>
			<th> ID </th>
			<th> Title </th>
			<th> User </th>
			<th> Action </th>
		</thead>
		<tbody class="table-hover">
		<?php
			foreach($posts as $post)
			{ ?>
				<tr>
				<td> <?= $post["id"] ?> </td>
				<td> <?= $post["title"] ?> </td>
				<td> <?= $post["user_id"] ?> </td>
				<td> <?php echo $this->Html->link('edit', ['controller' => "Posts", 'action' => 'edit', $post["id"]])." ".$this->Form->postLink('delete',[
				'controller' => "Posts", 
				'action' => 'delete', $post["id"]],['confirm' => __("Are you sure?")]); ?>
				</tr>

			<?php }
		?>		
		</tbody>
	</table>
<?= $this->Html->link("Create New Blog Post", ['controller' => 'Posts', 'action' => 'create']); ?>
</section>