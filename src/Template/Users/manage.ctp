<section class="container-fluid content">
	<table class="table table-striped">
		<thead>
			<th> ID </th>
			<th> Name </th>
			<th> Email </th>
			<th> Type </th>
			<th> Action </th>
		</thead>
		<tbody>
			<?php
			foreach($users as $user)
			{ ?>
				<tr>
				<td> <?= $user["id"] ?> </td>
				<td> <?= $user["name"] ?> </td>
				<td> <?= $user["email"] ?> </td>
				<td> <?= $user["type"] ?> </td>
				<td> <?php echo $this->Html->link('edit', ['controller' => "Users", 'action' => 'edit', $user["id"]])." ".$this->Form->postLink('delete',[
				'controller' => "Users", 
				'action' => 'delete', $user["id"]],['confirm' => __("Are you sure?")]); ?>
				</tr>

			<?php }
		?>		
		</tbody>
	</table>
</section>