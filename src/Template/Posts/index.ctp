<div class="container-fluid content">
	<section class="row gutter-6  img-hover" style="margin-bottom: 16px;">
		<div id="featured-article" class= "col-lg-6" style=" height: 940px; ">
		 <!-- main picture goes here -->
		 <a href="<?= $this->Url->build(array('controller' => 'Posts', 'action'=>'view', $posts[0]->id)); ?>" >
		 <div class="col-lg-6 small-overlay"> <?= $posts[0]->title; ?> </div>
		 <?= $this->Html->image($posts[0]->displayPic, array("class" => "img-responsive", "style" => "width:100%;height:100%;object-fit:cover;")) ?>
		 </a>
		</div>

		<div id="middle-articles" class="col-lg-3" style=" height: 940px;">
			<div class="row gutter-6" style="margin-bottom:6px;">
				<div class="col-lg-12" style="height:560px;">
				 <a href="<?= $this->Url->build(array('controller' => 'Posts', 'action'=>'view', $posts[1]->id)); ?>" >
					<div class="col-lg-12 small-overlay"> <?= $posts[1]->title; ?> </div>
					<?= $this->Html->image($posts[1]->displayPic, array("class" => "img-responsive", "style" => "width:100%;height:100%;object-fit:cover;")) ?>
					</a>
				</div>

			</div>
			<div class="row gutter-6 style="margin-bottom:6px;"">
				<div class="col-lg-12" style="height: 380px;">
				 <a href="<?= $this->Url->build(array('controller' => 'Posts', 'action'=>'view', $posts[2]->id)); ?>" >
					<div class="col-lg-12 small-overlay"> <?= $posts[2]->title; ?> </div>
					<?= $this->Html->image($posts[2]->displayPic, array("class" => "img-responsive", "style" => "width:100%;height:100%;object-fit:cover;")) ?>
					</a>
				</div>
			</div>
		</div>

		<div id="right-articles" class="col-lg-3" style=" height: 940px;">
			<div class="row gutter-6" style="margin-bottom:6px;">
				<div class="col-lg-12" style="height:380px;">
				 	<a href="<?= $this->Url->build(array('controller' => 'Posts', 'action'=>'view', $posts[3]->id)); ?>" >
					<div class="col-lg-12 small-overlay"> <?= $posts[3]->title; ?> </div>
					<?= $this->Html->image($posts[3]->displayPic, array("class" => "img-responsive", "style" => "width:100%;height:100%;object-fit:cover;")) ?>
					</a>
				</div>

			</div>
			<div class="row gutter-6" style="margin-bottom:6px;">
				<div class="col-lg-12" style="height:560px;">
				 <a href="<?= $this->Url->build(array('controller' => 'Posts', 'action'=>'view', $posts[4]->id)); ?>" >
					<div class="col-lg-12 small-overlay"> <?= $posts[4]->title; ?> </div>
					<?= $this->Html->image($posts[4]->displayPic, array("class" => "img-responsive", "style" => "width:100%;height:100%;object-fit:cover;")) ?>
					</a>
				</div>
			</div>
		</div>
	</section>

<?php 
	$num_posts = count($posts);
	$num_posts_rows = ceil(($num_posts - 5) / 3);
	$printed_posts = 5;
	for($i=0;$i<$num_posts_rows;$i++)
	{ ?>
		<div class="row sub-hover" >
		<?php 
		for($j=0;$j<3;$j++)
		{ ?>
			<div class="col-lg-4 <?php (($j == 2) ? print('sub-end') : print('sub-posts')) ?>">
			<?php
				if($printed_posts < $num_posts)
				{ ?>
					<a href="<?= $this->Url->build(array('controller' => 'Posts', 'action'=>'view', $posts[$printed_posts]->id)); ?>" >

					<?= $this->Html->image($posts[$printed_posts]->displayPic, array("style" =>"width:100%;height:75%;object-fit:cover;" ) ); ?>
					<header class="col-lg-12"> <h4> <?= $posts[$printed_posts]->title; ?> </h4> </header>

					<?php
					echo '</a>';
					$printed_posts++;
				}
			?>
			</div>

		<?php } ?>
		</div>

	<?php } ?>


</div>
